<?php

namespace App\Livewire\App\Profile;

use Livewire\Component;

class ProfileComponent extends Component
{
    public function render()
    {
        return view('livewire.app.profile.profile-component')->layout('livewire.app.layouts.base');
    }
}
