<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;

class AdminsComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.user.admins-component')->layout('livewire.admin.layouts.base');
    }
}
