<?php

namespace App\Livewire\App\Events;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateEventComponent extends Component
{
    use WithFileUploads;
    public $user_id, $name, $date, $location, $description, $banner, $updatedBanner;


    public function storeEvent()
    {
        $this->validate([
            'name' => 'required',
            'date' => 'required',
            'location' => 'required',
            'banner' => 'required',
            'banner.*' => 'mimes:jpeg,png,gif,pdf,mp4,avi,mov',
        ]);

        $data = new Event();
        $data->user_id = Auth::user()->id;
        $data->name = $this->name;
        $data->date = $this->date;
        $data->location = $this->location;
        $data->description = $this->description;
        // Save the extension
        $extension = $this->banner->extension();
        $data->extension = $extension;

        if ($this->banner) {
            $fileName = uniqid() . Carbon::now()->timestamp . '.' . $this->banner->extension();
            $this->banner->storeAs('events', $fileName);
            $data->banner = 'uploads/events/' . $fileName;
        } else{
            $data->banner = 'assets/images/placeholder-rect.jpg';
        }
        $data->save();

        $this->resetInputs();
        $this->dispatch('success', ['message' => 'Event Created successfully']);
    }

    public function resetInputs()
    {
        $this->name = '';
        $this->date = '';
        $this->location = '';
        $this->banner = '';
        $this->description = '';
        $this->updatedBanner = '';
        $this->user_id = '';
    }

    public function render()
    {
        $profile = User::find(user()->id);
        return view('livewire.app.events.create-event-component', ['profile'=>$profile])->layout('livewire.app.layouts.base');
    }
}
