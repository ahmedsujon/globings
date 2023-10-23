<?php

namespace App\Livewire\App\Payment;

use Livewire\Component;

class StripePaymentSuccessComponent extends Component
{
    public function render()
    {
        return view('livewire.app.payment.stripe-payment-success-component')->layout('livewire.app.layouts.base');
    }
}
