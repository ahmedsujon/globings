<?php

namespace App\Livewire\Admin\Category;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class CategoryComponent extends Component
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
            'slug' => 'required',
            'icon' => 'required',
        ]);

        $data = new Category();
        $data->name = $this->name;
        $data->slug = $this->slug;
        if ($this->icon) {
            $fileName = uniqid() . Carbon::now()->timestamp . '.' . $this->icon->extension();
            $this->icon->storeAs('category_icons', $fileName);
            $data->icon = 'uploads/category_icons/' . $fileName;
        } else{
            $data->icon = 'assets/images/placeholder.jpg';
        }
        $data->save();
        $this->resetInputs();
        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'New user added successfully']);
    }

    public function editData($id)
    {
        $data = Admin::find($id);
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

        $user = Admin::find($this->edit_id);
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
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->password = '';
        $this->avatar = '';
        $this->uploadedAvatar = '';
        $this->edit_id = '';
    }

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show_delete_confirmation');
    }

    public function deleteData()
    {
        $brand = Admin::find($this->delete_id);
        $brand->delete();
        $this->dispatch('admin_deleted');
        $this->delete_id = '';
    }

    public function render()
    {
        $admins = Admin::where('name', 'like', '%'.$this->searchTerm.'%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.category.category-component')->layout('livewire.admin.layouts.base');
    }
}
