<?php

namespace App\Livewire\App\Maps;

use Livewire\Component;

class MapViewComponent extends Component
{
    public function render()
    {
        return view('livewire.app.maps.map-view-component')->layout('livewire.app.layouts.base');
    }
}
