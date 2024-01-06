<?php

namespace App\Livewire\App\LoyaltyCards;

use App\Models\Shop;
use Livewire\Component;

class LoyaltyComponent extends Component
{
    public function render()
    {
        $rewarded_shops = Shop::get();
        $discover_shops = Shop::get();
        return view('livewire.app.loyalty-cards.loyalty-component', ['rewarded_shops'=>$rewarded_shops, 'discover_shops'=>$discover_shops])->layout('livewire.app.layouts.base');
    }
}
