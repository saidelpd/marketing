<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Load Frontend Home Page
     */
    public function index()
    {
        return view('frontend.home');
    }
}
