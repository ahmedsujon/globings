<?php

namespace App\Livewire\App\Profile;

use App\Models\User;
use Livewire\Component;

class ProfileComponent extends Component
{
    public function render()
    {
        $profile = User::find(user()->id);

        return view('livewire.app.profile.profile-component', ['profile'=>$profile])->layout('livewire.app.layouts.base');
    }
}
