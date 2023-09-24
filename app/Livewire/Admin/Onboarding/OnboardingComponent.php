<?php

namespace App\Livewire\Admin\Onboarding;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Onboarding;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class OnboardingComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $sortingValue = 10, $searchTerm;

    public $edit_id, $delete_id;
    public $photo, $uploadedPhoto;

    public function storeData()
    {
        $this->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = new Onboarding();
        if ($this->photo) {
            $fileName = uniqid() . Carbon::now()->timestamp . '.' . $this->photo->extension();
            $this->photo->storeAs('onboarding_images', $fileName);
            $data->photo = 'uploads/onboarding_images/' . $fileName;
        } else {
            $data->photo = 'assets/images/onboarding.jpg';
        }
        $data->save();

        $this->resetInputs();
        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'New image added successfully']);
    }

    public function editData($id)
    {
        $data = Onboarding::find($id);
        $this->uploadedPhoto = $data->photo;
        $this->edit_id = $data->id;
        $this->dispatch('showEditModal');
    }

    public function updateData()
    {
        $user = Onboarding::find($this->edit_id);
        if ($this->photo) {
            $imageName = Carbon::now()->timestamp . '_favicon' . $this->photo->extension();
            $this->photo->storeAs('onboarding_images', $imageName);
            $user->photo = 'uploads/onboarding_images/' . $imageName;
        }
        $user->save();
        $this->resetInputs();
        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'Image updated successfully']);
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->photo = '';
        $this->uploadedPhoto = '';
        $this->edit_id = '';
    }

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show_delete_confirmation');
    }

    public function deleteData()
    {
        $data = Onboarding::find($this->delete_id);
        if ($data) {
            $filePath = public_path($data->photo);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $data->delete();
            $this->dispatchBrowserEvent('image_deleted');
            $this->delete_id = '';
        }
    }

    public function render()
    {
        $onboarding_images = Onboarding::where('photo', 'like', '%'.$this->searchTerm.'%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.onboarding.onboarding-component', ['onboarding_images'=>$onboarding_images])->layout('livewire.admin.layouts.base');
    }
}
