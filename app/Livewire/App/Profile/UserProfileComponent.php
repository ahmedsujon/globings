<?php

namespace App\Livewire\App\Profile;

use Livewire\Component;

class UserProfileComponent extends Component
{
    public function render()
    {
        return view('livewire.app.profile.user-profile-component')->layout('livewire.app.layouts.base');
    }
}
