<?php

namespace App\Livewire\App\Profile;

use Livewire\Component;

class MyLocationComponent extends Component
{
    public function render()
    {
        return view('livewire.app.profile.my-location-component')->layout('livewire.app.layouts.base');
    }
}
