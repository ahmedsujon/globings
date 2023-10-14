<?php

namespace App\Livewire\Admin\Accounts;

use Livewire\Component;

class ViewAccountComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.accounts.view-account-component')->layout('livewire.admin.layouts.base');
    }
}
