<?php

namespace App\Livewire\App\Profile;

use Livewire\Component;

class RecentPhotosComponent extends Component
{
    public function render()
    {
        return view('livewire.app.profile.recent-photos-component')->layout('livewire.app.layouts.base');
    }
}
