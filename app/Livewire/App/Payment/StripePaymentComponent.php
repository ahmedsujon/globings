<?php

namespace App\Livewire\App\Payment;

use Livewire\Component;

class StripePaymentComponent extends Component
{
    public function render()
    {
        return view('livewire.app.payment.stripe-payment-component');
    }
}
