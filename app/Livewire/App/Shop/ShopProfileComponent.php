<?php

namespace App\Livewire\App\Shop;

use App\Models\Shop;
use Livewire\Component;

class ShopProfileComponent extends Component
{
    public $shop;
    public function mount($user_id)
    {
        $shop = Shop::where('user_id', $user_id)->first();
        $this->shop = $shop;
    }

    public function render()
    {
        return view('livewire.app.shop.shop-profile-component')->layout('livewire.app.layouts.base');
    }
}
