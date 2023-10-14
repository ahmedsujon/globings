<?php

namespace App\Livewire\Admin\Accounts;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditAccountComponent extends Component
{
    use WithFileUploads;
    public $first_name, $last_name, $email, $password, $phone, $UploadedAvatar, $avatar, $account_type, $user_id;
    
    public function mount($id)
    {
        $data = User::where('id', $id)->first();
        $this->first_name = $data->first_name;
        $this->last_name = $data->last_name;
        $this->email = $data->email;
        $this->account_type = $data->account_type;
        $this->phone = $data->phone;
        $this->UploadedAvatar = $data->avatar;
    }

    public function updateData()
    {
        $this->validate([
            'email' => 'required|unique:users,email,'.Auth::user()->id.'',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'password' => 'min:8|max:25',
        ]);

        $data = User::where('id', $this->user_id)->first();
        $data->first_name = $this->first_name;
        $data->last_name = $this->last_name;
        $data->email = $this->email;
        $data->phone = $this->phone;
        $data->account_type = 'Private';
        if($this->password != ''){
            $data->password = Hash::make($this->password);
        }
        
        if($this->avatar != ''){
            $imageName = Carbon::now()->timestamp. '.' . $this->avatar->extension();
            $this->avatar->storeAs('profiles',$imageName);
            $data->avatar = $imageName;
        }

        $data->save();
        $this->dispatchBrowserEvent('success', ['message'=>'Account Updated successfully']);
        return redirect()->back();
    }
    
    public function render()
    {
        return view('livewire.admin.accounts.edit-account-component')->layout('livewire.admin.layouts.base');
    }
}
