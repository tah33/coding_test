<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function activate()
    {
        return view('payment.activate');
    }

    public function payment(Request $request)
    {
        Stripe::setApiKey('sk_test_lLNB8XEqosKY4wou5vXYCftV00wWpnPhOq');

        Charge::create([
           'amount' => 100*10,
           'currency' => 'usd',
           'description' => 'Monthly Subscription',
           'source' => $request->stripeToken,
        ]);

        return redirect()->route('home')->with('success','Congrats! Your Monthly Subscription Has Been Done');
    }
}
