<?php

namespace App\Livewire\App\Profile;

use App\Models\User;
use Livewire\Component;

class ProfileComponent extends Component
{
public $first_name, $last_name, $email, $phone, $gender, $dob, $avatar, $uploadedAvatar, $edit_id;

    public function updateProfile()
    {
        $this->validate([
            'first_name' => 'required',
            'email' => 'required:email',
            'phone' => 'required',
            'gender' => 'required',
        ]);
        $data = User::where('id', user()->id)->first();
        $data->first_name = $this->first_name;
        $data->last_name = $this->last_name;
        $data->email = $this->email;
        $data->phone = $this->phone;
        $data->gender = $this->gender;
        $data->dob = $this->dob;
        $data->save();
        $this->resetInputs();
        $this->dispatch('success', ['message' => 'Shop updated successfully']);
    }

    public function resetInputs()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->phone = '';
        $this->gender = '';
        $this->dob = '';
        $this->edit_id = '';
    }

    public function render()
    {
        $profile = User::find(user()->id);
        return view('livewire.app.profile.profile-component', ['profile'=>$profile])->layout('livewire.app.layouts.base');
    }
}
