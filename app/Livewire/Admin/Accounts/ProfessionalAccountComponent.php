<?php

namespace App\Livewire\Admin\Accounts;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class ProfessionalAccountComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $sortingValue = 10, $searchTerm;

    public $first_name, $last_name, $email, $phone, $password, $account_type, $avatar, $uploadedAvatar, $status;
    public $edit_id, $delete_id;

    public function storeData()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required',
        ]);

        $data = new User();
        $data->first_name = $this->first_name;
        $data->last_name = $this->last_name;
        $data->email = $this->email;
        $data->phone = $this->phone;
        $data->account_type = "Private";
        $data->password = Hash::make($this->password);

        if ($this->avatar) {
            $fileName = uniqid() . Carbon::now()->timestamp . '.' . $this->avatar->extension();
            $this->avatar->storeAs('profiles', $fileName);
            $data->avatar = 'uploads/profiles/' . $fileName;
        } else {
            $data->avatar = 'assets/images/avatar.png';
        }

        $data->save();
        $this->resetInputs();
        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'New account created successfully']);
    }

    public function editData($id)
    {
        $data = User::find($id);
        $this->first_name = $data->first_name;
        $this->last_name = $data->last_name;
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
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'password' => 'required',
            ]);
        } else {
            $this->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
            ]);
        }

        $data = User::find($this->edit_id);
        $data->first_name = $this->first_name;
        $data->last_name = $this->last_name;
        $data->email = $this->email;
        $data->phone = $this->phone;
        $data->password = Hash::make($this->password);

        if ($this->avatar) {
            $fileName = uniqid() . Carbon::now()->timestamp . '.' . $this->avatar->extension();
            $this->avatar->storeAs('profiles', $fileName);
            $data->avatar = 'uploads/profiles/' . $fileName;
        } else {
            $data->avatar = 'assets/images/avatar.png';
        }
        $data->save();

        $this->resetInputs();
        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'Account updated successfully']);
    }


    public function changeStatus($id)
    {
        $category = User::find($id);
        if ($category->status == 0) {
            $category->status = 1;
        } else {
            $category->status = 0;
        }
        $category->save();
        $this->dispatch('success', ['message' => 'Account Suspended successfully']);
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->phone = '';
        $this->edit_id = '';
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
        $this->dispatch('account_deleted');
        $this->delete_id = '';
    }

    public function render()
    {
        $professional_accounts = User::where('account_type', 'Professional')->where('first_name', 'like', '%' . $this->searchTerm . '%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.accounts.professional-account-component', ['professional_accounts'=>$professional_accounts])->layout('livewire.admin.layouts.base');
    }
}
