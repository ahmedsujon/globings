<?php

namespace App\Livewire\App\Events;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class EventsComponent extends Component
{
    public function placeholder(){
        return view('placeholder');
    }

    public function render()
    {
        $events = Event::orderBy('id', 'asc')->get();
        return view('livewire.app.events.events-component', ['events'=>$events])->layout('livewire.app.layouts.base');
    }
}
