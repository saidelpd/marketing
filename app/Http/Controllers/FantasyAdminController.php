<?php

namespace App\Http\Controllers;



use App\Http\Requests\NotificationsRequest;
use App\Models\Raffle;
use App\Models\User;
use App\Notifications\UsersViewNotification;
use Illuminate\Http\Request;
/**
 * Jobs
 */
use App\Jobs\Fantasy\DashboardJob;
use App\Jobs\Fantasy\TicketsViewJob;
use App\Jobs\Fantasy\PaymentsViewJob;
use App\Jobs\Fantasy\UsersViewJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class FantasyAdminController extends Controller
{
    private $raffle;

    /**
     * Create a new controller instance.
     * @param Raffle $raffle
     */
    public function __construct(Raffle $raffle)
    {
        $this->middleware('auth');
        $this->raffle = $raffle::open()->first();
    }

    /**
     * Load Dashboard Page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
       return view('backend.home',get_object_vars($this->dispatchNow(new DashboardJob($this->raffle))));
    }

    /**
     * return Tickets View
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
     public function tickets(Request $request)
     {
         return view('backend.tickets',get_object_vars($this->dispatchNow(new TicketsViewJob($this->raffle,$request))));
     }

    /**
     * Show Payments View
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
     public function payments(Request $request)
     {
         return view('backend.payments',get_object_vars($this->dispatchNow(new PaymentsViewJob($this->raffle,$request))));
     }

    /**
     * Show Users View
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function users(Request $request)
    {
        return view('backend.users', get_object_vars($this->dispatchNow(new UsersViewJob($this->raffle,$request))));
    }


    /**
     * Load Profile Info
     */
    public function myProfile()
    {
        $title = 'My Profile';
        $user = Auth::user();
        $open_raffle = $this->raffle;
        return view('backend.profile', compact('user','open_raffle','title'));
    }

    /**
     * Send User Notification
     * @param NotificationsRequest $request
     */
    public function userViewNotification(NotificationsRequest $request)
    {
        ($request->notification_user == 'all')
            ? Notification::send(User::all(),new UsersViewNotification($request->notification_message))
            : User::where('email', $request->notification_user)->firstOrFail()->notify(new UsersViewNotification($request->notification_message));
    }


}
