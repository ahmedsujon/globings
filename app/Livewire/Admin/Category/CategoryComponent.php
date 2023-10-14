<?php

namespace App\Livewire\Admin\Category;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class CategoryComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $sortingValue = 10, $searchTerm;

    public $edit_id, $delete_id;
    public $name, $slug, $status, $avatar, $uploadedAvatar;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeData()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'avatar' => 'required',
        ]);

        $data = new Category();
        $data->name = $this->name;
        $data->slug = $this->slug;
        if ($this->avatar) {
            $fileName = uniqid() . Carbon::now()->timestamp . '.' . $this->avatar->extension();
            $this->avatar->storeAs('category', $fileName);
            $data->icon = 'uploads/category/' . $fileName;
        } else {
            $data->icon = 'assets/images/avatar.png';
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
        $this->edit_id = $data->id;
        $this->dispatch('showEditModal');
    }

    public function updateData()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $data = Category::find($this->edit_id);
        $data->name = $this->name;
        $data->slug = $this->slug;
        if ($this->avatar) {
            $fileName = uniqid() . Carbon::now()->timestamp . '.' . $this->avatar->extension();
            $this->avatar->storeAs('category', $fileName);
            $data->icon = 'uploads/category/' . $fileName;
        } else {
            $data->icon = 'assets/images/avatar.png';
        }
        $data->save();

        $this->resetInputs();
        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'Category updated successfully']);
    }


    public function changeStatus($id)
    {
        $category = Category::find($id);
        if ($category->status == 0) {
            $category->status = 1;
        } else {
            $category->status = 0;
        }
        $category->save();
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
        $this->avatar = '';
        $this->edit_id = '';
    }

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show_delete_confirmation');
    }

    public function deleteData()
    {
        $brand = Category::find($this->delete_id);
        $brand->delete();
        $this->dispatch('category_deleted');
        $this->delete_id = '';
    }

    public function render()
    {
        $categories = Category::where('name', 'like', '%'.$this->searchTerm.'%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.category.category-component', ['categories' => $categories])->layout('livewire.admin.layouts.base');
    }
}
