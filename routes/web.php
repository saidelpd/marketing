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
Route::get('/rules', ['as' => 'home.rules', 'uses' => 'HomeController@rules']);
Route::post('/contact', ['as' => 'home.contact', 'uses' => 'HomeController@contact']);
Route::post('/buy_tickets', ['as' => 'home.buyTickets', 'uses' => 'HomeController@buyTickets']);


Route::group(['prefix' => 'fantasy'], function () {
    Route::get('/dashboard', ['uses' => 'FantasyAdminController@index', 'as' => 'fantasy.dashboard']);
    Route::match(['get', 'post'], '/tickets', ['uses' => 'FantasyAdminController@tickets', 'as' => 'fantasy.tickets']);
    Route::match(['get', 'post'], '/payments', ['uses' => 'FantasyAdminController@payments', 'as' => 'fantasy.payments']);
    Route::match(['get', 'post'], '/users', ['uses' => 'FantasyAdminController@users', 'as' => 'fantasy.users']);

    Route::get('/buy_tickets', ['uses' => 'FantasyAdminController@buyTickets', 'as' => 'fantasy.buyTickets']);
    Route::post('/checkout', ['uses' => 'FantasyAdminController@checkout', 'as' => 'fantasy.checkout']);

    Route::post('/graphData', ['uses' => 'FantasyAdminController@graphData', 'as' => 'fantasy.graphData']);

    Route::get('/profile', ['uses' => 'FantasyAdminController@myProfile', 'as' => 'fantasy.myProfile']);
    Route::post('/store_profile', ['uses' => 'FantasyAdminController@storeProfile', 'as' => 'fantasy.storeProfile']);
    Route::post('/user_view_notification', ['uses' => 'FantasyAdminController@userViewNotification', 'as' => 'fantasy.userViewNotification']);
    Route::post('/user_change_password', ['uses' => 'FantasyAdminController@userChangePassword', 'as' => 'fantasy.userChangePassword']);
    Auth::routes();
});





