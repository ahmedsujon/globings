<?php

namespace App\Livewire\App\LoyaltyCards;

use Livewire\Component;

class LoyaltyComponent extends Component
{
    public function render()
    {
        return view('livewire.app.loyalty-cards.loyalty-component')->layout('livewire.app.layouts.base');
    }
}
