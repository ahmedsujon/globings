<?php

namespace App\Livewire\App\Payment;

use App\Models\Package;
use App\Models\PackageTimePlan;
use App\Models\UserSubscription;
use Livewire\Component;

class StripePaymentComponent extends Component
{
    public $package, $plan, $subscription;

    public function mount($subscription_id)
    {
        $subscription = UserSubscription::find($subscription_id);
        $plan = PackageTimePlan::find($subscription->time_plan_id);
        $package = Package::find($subscription->package_id);

        $this->subscription = $subscription;
        $this->package = $package;
        $this->plan = $plan;

    }

    public function render()
    {
        return view('livewire.app.payment.stripe-payment-component')->layout('livewire.app.layouts.base');
    }
}
