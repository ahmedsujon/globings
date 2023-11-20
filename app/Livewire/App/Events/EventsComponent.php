<?php

namespace App\Livewire\App\Events;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class EventsComponent extends Component
{
    public $searchTerm;

    public function render()
    {
        $events = Event::where('name', 'like', '%' . $this->searchTerm . '%')->orderBy('id', 'DESC')->get();
        return view('livewire.app.events.events-component', ['events'=>$events])->layout('livewire.app.layouts.base');
    }
}
