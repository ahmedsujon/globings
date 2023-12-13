<?php

namespace App\Livewire\App\Events;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

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
            'banner' => 'required|mimes:jpeg,jpg,webp,png,mp4,avi,mov|max:10240',
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
            $image = Image::make($this->banner)->resize(626, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 75);
            $directory = 'uploads/events/';

            $fileName = uniqid() . Carbon::now()->timestamp . '.webp';
            Storage::disk('do_spaces')->put($directory.$fileName, $image->getEncoded());
            $data->banner = env('DO_SPACES_ENDPOINT') . '/' . $directory . $fileName;

            // $fileName = uniqid() . Carbon::now()->timestamp . '.' . $this->banner->extension();
            // $this->banner->storeAs('uploads/events', $fileName, 'do_spaces');
            // $data->banner = env('DO_SPACES_ENDPOINT') . '/uploads/events/' . $fileName;
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
