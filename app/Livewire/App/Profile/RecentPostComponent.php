<?php

namespace App\Livewire\App\Profile;

use Livewire\Component;

class RecentPostComponent extends Component
{
    public function render()
    {
        return view('livewire.app.profile.recent-post-component')->layout('livewire.app.layouts.base');
    }
}
