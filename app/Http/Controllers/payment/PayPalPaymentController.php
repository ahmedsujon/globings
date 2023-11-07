<?php

namespace App\Http\Controllers\payment;

use Carbon\Carbon;
use Omnipay\Omnipay;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\PackageTimePlan;
use App\Models\UserSubscription;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PayPalPaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_ID'));
        $this->gateway->setSecret(env('PAYPAL_SECRET'));
        $this->gateway->setTestMode(env('PAYPAL_TEST_MODE'));
    }

    public function makePayment(Request $request)
    {
        try {
            $sub_id = $request->get('sub_id');

            $subscription = UserSubscription::find($sub_id);
            $plan = PackageTimePlan::find($subscription->time_plan_id);
            $package = Package::find($subscription->package_id);

            $response = $this->gateway->purchase(array(
                'user_id' => Auth::user()->id,
                'amount' => $subscription->price,
                'currency' => 'eur',
                'returnUrl' => route('app.paypalPaymentSuccess') . '?user_id=' . Auth::user()->id . '&subscription_id=' . $sub_id,
                'cancelUrl' => route('app.planPayment', ['subscription_id' => $sub_id]),
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function paymentSuccess(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();

                $getData = UserSubscription::where('paypal_payment_id', $request->input('paymentId'))->first();
                if (!$getData) {
                    $user_sub = UserSubscription::find($request->get('subscription_id'));
                    $user_sub->paid_via = 'paypal';
                    $user_sub->paypal_payment_id = $request->input('paymentId');
                    $user_sub->customer_token = $request->input('token');
                    $user_sub->paypal_payment_info = json_encode([
                        'payment_id' => $arr['id'],
                        'payer_id' => $arr['payer']['payer_info']['payer_id'],
                        'payer_email' => $arr['payer']['payer_info']['email'],
                        'amount' => $arr['transactions'][0]['amount']['total'],
                        'currency' => 'eur',
                        'payment_status' => $arr['state']
                    ]);
                    $user_sub->start_date = Carbon::parse(now());
                    $user_sub->end_date = Carbon::parse(now())->addMonths(1);
                    $user_sub->payment_status = 'paid';
                    $user_sub->last_payment = Carbon::parse(now());
                    $user_sub->next_payment = Carbon::parse(now())->addMonths(1);
                    $user_sub->active = 1;
                    $user_sub->save();

                    return redirect()->route('app.paymentSuccessComponent');
                } else {
                    abort(404);
                }
            } else {
                session()->flash('error', 'Something went wrong. Please try again');
                return $response->getMessage();
            }
        } else {
            session()->flash('error', 'Payment declined!');
        }
    }

    public function error()
    {
        session()->flash('error', 'User declined the payment!');
    }
}
