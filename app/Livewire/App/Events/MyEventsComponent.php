<?php

namespace App\Livewire\App\Events;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyEventsComponent extends Component
{
    public $searchTerm;

    public function render()
    {
        $events = Event::where('name', 'like', '%' . $this->searchTerm . '%')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('livewire.app.events.my-events-component', ['events'=>$events])->layout('livewire.app.layouts.base');
    }
}
