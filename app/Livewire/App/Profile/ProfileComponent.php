<?php

namespace App\Livewire\App\Profile;

use App\Models\Shop;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileComponent extends Component
{
    use WithFileUploads;

    public $first_name, $last_name, $email, $phone, $gender, $dob, $avatar, $uploadedAvatar, $edit_id;
    public $currentPassword, $newPassword, $confirmPassword;

    public function changeNotificationStatus()
    {
        $user = User::find(Auth::user()->id);
        $user->notification_status = $user->notification_status == 1 ? 0 : 1;
        $user->save();
    }
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
        $this->dispatch('success', ['message' => 'Profile updated successfully']);
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

    public function updatedavatar()
    {
        $this->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,webp,gif,svg|max:15000',
        ]);

        if ($this->avatar) {
            $image = Image::make($this->avatar)->resize(626, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 75);
            $directory = 'uploads/profiles/';

            $fileName = uniqid() . Carbon::now()->timestamp . '.webp';
            Storage::disk('do_spaces')->put($directory . $fileName, $image->getEncoded());
            $img = env('DO_SPACES_ENDPOINT') . '/' . $directory . $fileName;

            $profile = User::where('id', user()->id)->first();
            $profile->avatar = $img;
            $profile->save();

            if(user()->account_type == 'professional')
            {
                $shop = Shop::where('user_id', user()->id)->first();
                $shop->profile_image = $img;
                $shop->save();
            }

            $this->dispatch('success', ['message' => 'Profile photo updated successfully']);
        }
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
        $this->dispatch('success', ['message' => 'Password changed successfully.']);
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
        return view('livewire.app.profile.profile-component', ['profile' => $profile])->layout('livewire.app.layouts.base');
    }
}
