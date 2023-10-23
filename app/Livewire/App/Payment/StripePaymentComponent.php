<?php

namespace App\Livewire\App\Payment;

use App\Models\UserSubscription;
use Livewire\Component;

class StripePaymentComponent extends Component
{
    public function mount($subscription_id)
    {
        $sub = UserSubscription::find($subscription_id);
        
    }

    public function render()
    {
        return view('livewire.app.payment.stripe-payment-component')->layout('livewire.app.layouts.base');
    }
}
