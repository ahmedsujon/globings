<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class SubCategoryComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $sortingValue = 10, $searchTerm;

    public $edit_id, $delete_id;
    public $category_id, $level, $name, $slug, $status, $avatar, $uploadedAvatar;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeData()
    {
        $this->validate([
            'category_id' =>'required',
            'level' => 'required',
            'name' => 'required',
            'slug' => 'required',
        ]);

        $data = new Category();
        $data->parent_id = $this->category_id;
        $data->level = 1;
        $data->name = $this->name;
        $data->slug = $this->slug;
        $data->save();

        $this->resetInputs();
        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'New sub-category added successfully']);
    }

    public function editData($id)
    {
        $data = Category::find($id);
        $this->category_id = $data->parent_id;
        $this->level = 1;
        $this->name = $data->name;
        $this->slug = $data->slug;
        $this->edit_id = $data->id;
        $this->dispatch('showEditModal');
    }

    public function updateData()
    {
        $this->validate([
            'category_id' => 'required',
            'level' => 'required',
            'name' => 'required',
            'slug' => 'required',
        ]);

        $data = Category::find($this->edit_id);
        $data->parent_id = $this->category_id;
        $data->level = 1;
        $data->name = $this->name;
        $data->slug = $this->slug;
        $data->save();

        $this->resetInputs();
        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'Sub-category updated successfully']);
    }


    public function changeStatus($id)
    {
        $sub_category = Category::find($id);
        if ($sub_category->status == 0) {
            $sub_category->status = 1;
        } else {
            $sub_category->status = 0;
        }
        $sub_category->save();
        $this->dispatch('success', ['message' => 'Sub-category updated successfully']);
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->category_id = '';
        $this->level = '';
        $this->name = '';
        $this->slug = '';
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
        $this->dispatch('sub_category_deleted');
        $this->delete_id = '';
    }

    public function render()
    {
        $categories = Category::where('status', 1)->where('parent_id', 0)->get();
        $sub_categories = Category::where('name', 'like', '%'.$this->searchTerm.'%')->where('parent_id', '!=', 0)->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.category.sub-category-component', ['sub_categories'=>$sub_categories, 'categories'=>$categories])->layout('livewire.admin.layouts.base');
    }
}
