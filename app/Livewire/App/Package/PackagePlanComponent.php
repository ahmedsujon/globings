<?php

namespace App\Livewire\App\Package;

use App\Models\Package;
use App\Models\PackageTimePlan;
use App\Models\UserSubscription;
use Livewire\Component;

class PackagePlanComponent extends Component
{
    public $plan_id;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'plan_id' => 'required'
        ],[
            'plan_id.required' => 'Select a plan first',
        ]);
    }

    public function subscribePlan()
    {
        $this->validate([
            'plan_id' => 'required'
        ],[
            'plan_id.required' => 'Select a plan first',
        ]);

        $getPendingSub = UserSubscription::where('user_id', user()->id)->where('payment_status', 'pending')->first();

        $subscription_id = '';
        $plan = PackageTimePlan::find($this->plan_id);

        if($getPendingSub){
            $getPendingSub->package_id = $plan->package_id;
            $getPendingSub->time_plan_id = $this->plan_id;
            $getPendingSub->price = $plan->price;
            $getPendingSub->save();

            $subscription_id = $getPendingSub->id;
        } else {
            $subscription = new UserSubscription();
            $subscription->user_id = user()->id;
            $subscription->package_id = $plan->package_id;
            $subscription->time_plan_id = $this->plan_id;
            $subscription->price = $plan->price;
            $subscription->save();

            $subscription_id = $subscription->id;
        }

        return redirect()->route('app.planPaymentViaStripe', ['subscription_id' => $subscription_id]);
    }

    public function render()
    {
        $plans = Package::where('status', 1)->get();

        foreach ($plans as $plan) {
            $time_plans = PackageTimePlan::where('package_id', $plan->id)->get();

            $plan->timePlans = $time_plans;
        }

        return view('livewire.app.package.package-plan-component', ['plans'=>$plans])->layout('livewire.app.layouts.base');
    }
}
