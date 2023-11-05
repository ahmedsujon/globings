<?php

namespace App\Livewire\App\Events;

use Livewire\Component;

class CreateEventComponent extends Component
{
    public function render()
    {
        return view('livewire.app.events.create-event-component')->layout('livewire.app.layouts.base');
    }
}
