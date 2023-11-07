<?php

namespace App\Http\Controllers\payment;

use App\Models\Package;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Models\PackageTimePlan;
use App\Models\UserSubscription;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class StripePaymentController extends Controller
{
    public function makePayment(Request $request)
    {
        $sub_id = $request->get('subscription_id');

        $subscription = UserSubscription::find($sub_id);
        $plan = PackageTimePlan::find($subscription->time_plan_id);
        $package = Package::find($subscription->package_id);

        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'eur',
                        'product_data' => [
                            'name' => $package->name .' - '. $plan->name,
                            'description' => $plan->description,
                        ],
                        'unit_amount'  => $subscription->price.'00',
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('app.stripePaymentSuccess').'?subscription_id='.$sub_id.'&&session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => route('app.planPayment', ['subscription_id'=>$sub_id]),
        ]);

        return redirect()->away($session->url);
    }

    public function paymentSuccess(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $session_id = $request->query('session_id');

        try {
            $session = Session::retrieve($session_id);
            // Access the Payment Intent ID (transaction ID)
            $paymentIntentId = $session->payment_intent;

            $subscription = UserSubscription::find(request()->get('subscription_id'));
            $subscription->start_date = Carbon::parse(now());
            $subscription->end_date = Carbon::parse(now())->addMonths(1);
            $subscription->payment_status = 'paid';
            $subscription->last_payment = Carbon::parse(now());
            $subscription->next_payment = Carbon::parse(now())->addMonths(1);
            $subscription->stripe_transaction_id = $paymentIntentId;
            $subscription->active = 1;
            $subscription->save();

            return redirect()->route('app.paymentSuccessComponent');

        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
