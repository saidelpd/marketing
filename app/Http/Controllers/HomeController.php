<?php

namespace App\Http\Controllers;
use App\Http\Requests\BuyTicketsRequest;
use App\Http\Requests\HomeContactRequest;
use App\Mail\ContactUs;
use App\Models\Raffle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laravel\Cashier\Cashier;

class HomeController extends Controller
{
    /**
     * Load Frontend Home Page
     */
    public function index()
    {
        $raffle = Raffle::with('photos')->open()->first();
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
     */
    public function buyTickets(BuyTicketsRequest $request)
    {

    }
}
