<?php

namespace App\Livewire\App\Shop;

use Livewire\Component;

class ShopsComponent extends Component
{
    public function render()
    {
        return view('livewire.app.shop.shops-component')->layout('livewire.app.layouts.base');
    }
}
