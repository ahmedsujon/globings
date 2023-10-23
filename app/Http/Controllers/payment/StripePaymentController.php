<?php

namespace App\Http\Controllers\payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    public function makePayment(Request $request)
    {
        $sub_id = $request->get('subscription_id');
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'eur',
                        'product_data' => [
                            'name' => 'gimme money!!!!',
                        ],
                        'unit_amount'  => 500,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('app.stripePaymentSuccess'),
            'cancel_url'  => route('app.planPaymentViaStripe', ['subscription_id'=>$sub_id]),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return "Yay, It works!!!";
    }
}
