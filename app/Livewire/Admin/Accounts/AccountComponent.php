<?php

namespace App\Livewire\Admin\Accounts;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AccountComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;

    public $edit_id, $delete_id;
    public $first_name, $slug, $status;

    public function render()
    {
        $accounts = User::where('first_name', 'like', '%'.$this->searchTerm.'%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.accounts.account-component', ['accounts'=>$accounts])->layout('livewire.admin.layouts.base');
    }
}
