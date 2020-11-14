<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Activate Account
Route::get('account-activate','PaymentController@activate')->name('activate.account');

//Payment
Route::post('stripe-payment','PaymentController@payment')->name('stripe.payment');
