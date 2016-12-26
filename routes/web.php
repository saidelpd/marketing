<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::post('/contact', ['as' => 'home.contact', 'uses' => 'HomeController@contact']);
Route::post('/buy_tickets', ['as' => 'home.buyTickets', 'uses' => 'HomeController@buyTickets']);


