<?php

namespace App\Livewire\Admin\Category;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class CategoryComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $sortingValue = 10, $searchTerm;

    public $edit_id, $delete_id;
    public $name, $slug, $icon, $uploadedIcon;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

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
        } else {
            $data->icon = 'assets/images/placeholder.jpg';
        }
        $data->save();
        $this->resetInputs();
        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'New category added successfully']);
    }

    public function editData($id)
    {
        $data = Category::find($id);
        $this->name = $data->name;
        $this->slug = $data->slug;
        $this->uploadedIcon = $data->icon;
        $this->edit_id = $data->id;
        $this->dispatch('showEditModal');
    }

    public function updateData()
    {
        if ($this->icon) {
            $this->validate([
                'name' => 'required',
                'slug' => 'required',
            ]);
        } else {
            $this->validate([
                'name' => 'required',
                'slug' => 'required',
                'icon' => 'required',
            ]);
        }

        $data = Category::find($this->edit_id);
        $data->name = $this->name;
        $data->slug = $this->slug;
        if ($this->icon) {
            $fileName = uniqid() . Carbon::now()->timestamp . '.' . $this->icon->extension();
            $this->icon->storeAs('category_icons', $fileName);
            $data->icon = 'uploads/category_icons/' . $fileName;
        } else {
            $data->icon = 'assets/images/placeholder.jpg';
        }
        $data->save();
        $this->resetInputs();
        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'Category updated successfully']);
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->name = '';
        $this->slug = '';
        $this->icon = '';
        $this->uploadedIcon = '';
        $this->edit_id = '';
    }

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show_delete_confirmation');
    }

    public function deleteData()
    {
        $data = Category::find($this->delete_id);
        if ($data) {
            $filePath = public_path($data->icon);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $data->delete();
            $this->dispatch('category_deleted');
            $this->delete_id = '';
        }
    }

    public function render()
    {
        $categories = Category::where('name', 'like', '%' . $this->searchTerm . '%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.category.category-component', ['categories' => $categories])->layout('livewire.admin.layouts.base');
    }
}
