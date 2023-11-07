<?php

namespace App\Livewire\App\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileComponent extends Component
{
public $first_name, $last_name, $email, $phone, $gender, $dob, $avatar, $uploadedAvatar, $edit_id;
public $currentPassword, $newPassword, $confirmPassword;

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
        $this->dispatch('success', ['message' => 'Shop updated successfully']);
    }

    public function mount()
    {
        $data = User::find(user()->id);
        $this->first_name = $data->first_name;
        $this->last_name = $data->last_name;
        $this->email = $data->email;
        $this->phone = $data->phone;
        $this->gender = $data->gender;
        $this->dob = $data->dob;
        $this->edit_id = $data->id;
    }

    public function changePassword()
    {
        $this->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8|different:currentPassword|same:confirmPassword',
            'confirmPassword' => 'required',
        ]);

        if (!Hash::check($this->currentPassword, Auth::user()->password)) {
            $this->addError('currentPassword', 'The current password is incorrect.');
            return;
        }

        Auth::user()->update([
            'password' => Hash::make($this->newPassword),
        ]);

        $this->currentPassword = '';
        $this->newPassword = '';
        $this->confirmPassword = '';

        session()->flash('message', 'Password changed successfully.');
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
