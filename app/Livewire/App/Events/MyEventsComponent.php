<?php

namespace App\Livewire\App\Events;

use App\Models\Event;
use Livewire\Component;

class MyEventsComponent extends Component
{
    public function render()
    {
        $events = Event::orderBy('id', 'asc')->get();
        return view('livewire.app.events.my-events-component', ['events'=>$events])->layout('livewire.app.layouts.base');
    }
}
