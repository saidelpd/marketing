<?php

namespace App\Http\Controllers;
use App\Models\Raffle;
use Illuminate\Http\Request;

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
}
