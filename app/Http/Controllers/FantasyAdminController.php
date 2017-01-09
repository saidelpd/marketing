<?php

namespace App\Http\Controllers;
use App\Http\Helpers\BuyTickets;
use App\Http\Requests\NotificationsRequest;
use App\Http\Requests\PasswordChangeRequest;
use App\Http\Requests\ProfileRequest;
use App\Jobs\Fantasy\GraphJob;
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
use Illuminate\Support\Facades\Hash;
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
        return view('backend.home', get_object_vars($this->dispatchNow(new DashboardJob($this->raffle))));
    }

    /**
     * return Tickets View
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tickets(Request $request)
    {
        return view('backend.tickets', get_object_vars($this->dispatchNow(new TicketsViewJob($this->raffle, $request))));
    }

    /**
     * Show Payments View
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function payments(Request $request)
    {
        return view('backend.payments', get_object_vars($this->dispatchNow(new PaymentsViewJob($this->raffle, $request))));
    }

    /**
     * Show Users View
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function users(Request $request)
    {
        return view('backend.users', get_object_vars($this->dispatchNow(new UsersViewJob($this->raffle, $request))));
    }

    /**
     * Buy Ticket View
     */
    public function buyTickets()
    {
        $open_raffle = $this->raffle;
        $title = 'Buy Tickets';
        return view('backend.buy_tickets',compact('open_raffle','title'));
    }

    /**
     * Simple Ticket buy CheckOut
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkout(Request $request)
    {
        $charge  = new BuyTickets($this->raffle , $request);
        if($charge->has_error)
        {
            return response()->json(['status'=>$charge->message],417);
        }
    }


    /**
     * Load Profile Info
     */
    public function myProfile()
    {
        $title = 'My Profile';
        $user = Auth::user();
        $open_raffle = $this->raffle;
        return view('backend.profile', compact('user', 'open_raffle', 'title'));
    }

    /**
     * Save Profile
     * @param ProfileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeProfile(ProfileRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zip = $request->zip;
        $user->save();
        return $user;
    }

    /**
     * Change User Password
     * @param PasswordChangeRequest $request
     */
    public function userChangePassword(PasswordChangeRequest $request)
    {
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();
    }

    /**
     * Send User Notification
     * @param NotificationsRequest $request
     */
    public function userViewNotification(NotificationsRequest $request)
    {
        ($request->notification_user == 'all')
            ? Notification::send(User::all(), new UsersViewNotification($request->notification_message))
            : User::where('email', $request->notification_user)->firstOrFail()->notify(new UsersViewNotification($request->notification_message));
    }

    /**
     * return graphData
     */
    public function graphData()
    {
        return  get_object_vars($this->dispatchNow(new GraphJob($this->raffle)));
    }


}
