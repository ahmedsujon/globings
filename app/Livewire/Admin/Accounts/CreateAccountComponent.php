<?php

namespace App\Livewire\Admin\Accounts;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class CreateAccountComponent extends Component
{
    use WithFileUploads;
    public $first_name, $last_name, $email, $password, $phone, $avatar, $account_type;

    public function storeData()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required',
            'password' => 'min:8|max:25',
        ]);

        $data = new User();
        $data->first_name = $this->first_name;
        $data->last_name = $this->last_name;
        $data->email = $this->email;
        $data->phone = $this->phone;
        $data->account_type = 'Private';
        $data->password = Hash::make($this->password);
        if ($this->avatar) {
            $fileName = uniqid() . Carbon::now()->timestamp . '.' . $this->avatar->extension();
            $this->avatar->storeAs('profiles', $fileName);
            $data->avatar = 'uploads/profiles/' . $fileName;
        } else{
            $data->avatar = 'assets/images/avatar.png';
        }

        $data->save();
        $this->dispatch('success', ['message' => 'New account created successfully']);
        return redirect()->route('admin.private.accounts');
    }

    public function render()
    {
        return view('livewire.admin.accounts.create-account-component')->layout('livewire.admin.layouts.base');
    }
}
