<?php

namespace App\Http\Controllers;

use App\Http\Helpers\HelperClass;
use App\Models\Payments;
use App\Models\Raffle;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


    public function index()
    {
        $page_title = 'Dashboard';
        $open_raffle = $this->raffle;
        $user = Auth::user();
        $total_users = $total_income = $total_tickets = 0;
        $latest_tickets = Ticket::take(15)->orderBy('id','Desc');
        if(!$user->isAdmin())
        {
            $latest_tickets = $latest_tickets->where('user_id',$user->id);
        }
        else{
            $payments = Payments::where('raffle_id',$open_raffle->id)
                ->get(['charge_amount','fee','discount']);
            $total_payments = $payments->count();
            $total_income = HelperClass::currency($payments->sum('income'));
            $total_users = User::count();
            $total_tickets = Ticket::where('raffle_id',$open_raffle->id)->count();
        }
        $latest_tickets =  $latest_tickets->get();
        return view('backend.home',compact('user','open_raffle','latest_tickets','total_users','total_income','total_tickets','total_payments','page_title'));
    }

    /**
     * return Tickets View
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
     public function tickets(Request $request)
     {
         $page_title = 'Tickets';
         $open_raffle = $this->raffle;
         $user = Auth::user();
         $users_list = null;
         $tickets = Ticket::with([
                 'raffle'=>function($r){$r->select('id','obj_name','ticket_cost');},
                 'user'=>function($u){$u->select('id','name','last_name');},
                 'payment'=>function($p){$p->select('id','billing_id');}
             ]);
         /**
          * Add Filters
          */
         if($request->ticket_number)
         {
             $tickets = $tickets->where('ticket_number',$request->ticket_number);
         }
         if($request->owner && $request->owner !=0 )
         {
             $tickets = $tickets->where('user_id',$request->owner);
         }
         if(!$user->isAdmin())
         {
             $tickets = $tickets->where('user_id',$user->id);
         }
         else{
             $users_list = User::orderBy('name')->get(['name','last_name','id']);
         }
         $tickets =  $tickets->paginate(25)->appends(['owner'=>$request->owner]);
         return view('backend.tickets',compact('page_title','open_raffle','tickets','user','users_list'));
     }

    /**
     * Show Payments View
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
     public function payments(Request $request)
     {
         $page_title = 'Payments';
         $open_raffle = $this->raffle;
         $user = Auth::user();
         $users_list = null;
         $payments = Payments::with([
             'raffle'=>function($r){$r->select('id','obj_name','ticket_cost');},
             'user'=>function($u){$u->select('id','name','last_name');},
             'tickets'=>function($p){$p->select('id','ticket_number','payment_id');}
          ]);
         /**
          * Add Filters
          */
         if($request->payment_id)
         {
             $payments = $payments->where('billing_id',$request->payment_id);
         }
         if($request->owner && $request->owner !=0 )
         {
             $payments = $payments->where('user_id',$request->owner);
         }
         if(!$user->isAdmin())
         {
             $payments = $payments->where('user_id',$user->id);
         }
         else{
             $users_list = User::orderBy('name')->get(['name','last_name','id']);
         }
         $payments =  $payments->paginate(25)->appends(['owner'=>$request->owner]);

         return view('backend.payments',compact('page_title','open_raffle','payments','user','users_list'));
     }


}
