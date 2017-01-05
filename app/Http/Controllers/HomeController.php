<?php

namespace App\Http\Controllers;
use App\Http\Helpers\BuyTickets;
use App\Http\Requests\BuyTicketsRequest;
use App\Http\Requests\HomeContactRequest;
use App\Mail\ContactUs;
use App\Models\Raffle;
use App\Notifications\SendContactUsNotification;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    private $raffle;

    /**
     * HomeController constructor.
     * @param $raffle
     */
    public function __construct(Raffle $raffle)
    {
        $this->raffle = $raffle::with(['photos'=>function($p){
            $p->orderBy('path');
        }])->open()->first();
    }

    /**
     * Load Frontend Home Page
     */
    public function index()
    {
        $raffle = $this->raffle;
        return view('frontend.home')->with(compact('raffle'));
    }

    /**
     * Send Contact Message
     * @param HomeContactRequest $request
     */
    public function contact(HomeContactRequest $request)
    {
        Mail::send(new ContactUs($request));
    }

    /**
     * Buy Tickets
     * @param BuyTicketsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function buyTickets(BuyTicketsRequest $request)
    {
        $charge  = new BuyTickets($this->raffle , $request);
         if($charge->has_error)
         {
             return response()->json(['status'=>$charge->message],417);
         }
    }
}
