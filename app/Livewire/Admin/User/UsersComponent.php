<?php

namespace App\Livewire\Admin\User;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class UsersComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $sortingValue = 10, $searchTerm;

    public $edit_id, $delete_id;
    public $name, $email, $phone, $password, $avatar, $uploadedAvatar;

    public function storeData()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'min:8|max:25',
        ]);

        $data = new User();
        $data->name = $this->name;
        $data->email = $this->email;
        $data->phone = $this->phone;
        $data->password = Hash::make($this->password);
        if ($this->avatar) {
            $fileName = uniqid() . Carbon::now()->timestamp . '.' . $this->avatar->extension();
            $this->avatar->storeAs('profile_images', $fileName);
            $data->avatar = 'uploads/profile_images/' . $fileName;
        } else{
            $data->avatar = 'assets/images/avatar.png';
        }
        $data->save();

        $this->resetInputs();
        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'New user added successfully']);
    }

    public function editData($id)
    {
        $data = User::find($id);
        $this->name = $data->name;
        $this->email = $data->email;
        $this->phone = $data->phone;
        $this->uploadedAvatar = $data->avatar;
        $this->edit_id = $data->id;

        $this->dispatch('showEditModal');
    }

    public function updateData()
    {
        if ($this->password) {
            $this->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'password' => 'min:8|max:25',
            ]);
        } else {
            $this->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric',
            ]);
        }

        $user = User::find($this->edit_id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone = $this->phone;

        if ($this->password) {
            $user->password = Hash::make($this->password);
        }
        if ($this->avatar) {
            $imageName = Carbon::now()->timestamp . '_favicon' . $this->avatar->extension();
            $this->avatar->storeAs('profile_images', $imageName);
            $user->avatar = 'uploads/profile_images/' . $imageName;
        }
        $user->save();

        $this->resetInputs();
        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'User updated successfully']);
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->password = null;
        $this->avatar = null;
        $this->uploadedAvatar = null;
        $this->edit_id = null;
    }

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show_delete_confirmation');
    }

    public function deleteData()
    {
        $brand = User::find($this->delete_id);
        $brand->delete();
        $this->dispatch('user_deleted');
        $this->delete_id = '';
    }

    public function render()
    {
        $users = User::where('name', 'like', '%'.$this->searchTerm.'%')->orderBy('id', 'DESC')->paginate($this->sortingValue);

        $this->dispatch('reload_scripts');
        return view('livewire.admin.user.users-component', ['users'=>$users])->layout('livewire.admin.layouts.base');
    }
}
