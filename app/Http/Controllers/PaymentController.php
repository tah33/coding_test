<?php

namespace App\Http\Controllers;

use App\Payment;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Stripe\Charge;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function activate()
    {
        return view('payment.activate');
    }

    public function payment(Request $request)
    {
        try {
            //        Getting Stripe Secret Key
            Stripe::setApiKey('sk_test_lLNB8XEqosKY4wou5vXYCftV00wWpnPhOq');//Paying Amount
            $charge = Charge::create([
                'amount' => 100 * 10,
                'currency' => 'usd',
                'description' => 'Activating Account',
                'source' => $request->stripeToken,
            ]);

            if ($charge)
            {
                //Activating User
                User::where('id',Auth::id())->update(['status'=>1]);

                //storing for getting month wise report
                Payment::create([
                    'user_id' => Auth::id(),
                    'amount' => 10,
                    'start_date' => Carbon::now(),
                    'end_date' => Carbon::now()->addMonths(1),
                ]);
                return redirect()->route('home')->with('success', 'Congrats! Your Account Has Been Activated');
            }

        } catch (\Exception $e) {
            return back()->with('error','Operation Failed');
        }
    }
}
