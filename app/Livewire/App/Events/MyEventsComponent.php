<?php

namespace App\Livewire\App\Events;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyEventsComponent extends Component
{
    public function render()
    {
        $events = Event::where('user_id', Auth::user()->id)->orderBy('id', 'asc')->get();
        return view('livewire.app.events.my-events-component', ['events'=>$events])->layout('livewire.app.layouts.base');
    }
}
