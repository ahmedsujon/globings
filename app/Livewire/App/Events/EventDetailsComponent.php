<?php

namespace App\Livewire\App\Events;

use App\Models\Shop;
use App\Models\Event;
use Livewire\Component;

class EventDetailsComponent extends Component
{
    public $event, $shop, $user_id;

    public function mount($id)
    {
        $event = Event::where('id', $id)->first();
        $this->event = $event;
    }

    public function render()
    {
        return view('livewire.app.events.event-details-component')->layout('livewire.app.layouts.base');
    }
}
