<?php

namespace App\Http\Controllers;

use Session;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
        ]);

        return back();
    }
}
