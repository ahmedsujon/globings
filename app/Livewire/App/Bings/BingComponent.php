<?php

namespace App\Livewire\App\Bings;

use Livewire\Component;

class BingComponent extends Component
{
    public function render()
    {
        return view('livewire.app.bings.bing-component')->layout('livewire.app.layouts.base');
    }
}
