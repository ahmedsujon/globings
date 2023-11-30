<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class SubCategoryComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $sortingValue = 10, $searchTerm;

    public $edit_id, $delete_id;
    public $category_id, $name, $slug, $status, $avatar, $uploadedAvatar;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeData()
    {
        $this->validate([
            'category_id' =>'required',
            'name' => 'required',
            'slug' => 'required',
        ]);

        $data = new SubCategory();
        $data->category_id = $this->category_id;
        $data->name = $this->name;
        $data->slug = $this->slug;
        $data->save();

        $this->resetInputs();
        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'New sub-category added successfully']);
    }

    public function editData($id)
    {
        $data = SubCategory::find($id);
        $this->category_id = $data->category_id;
        $this->name = $data->name;
        $this->slug = $data->slug;
        $this->edit_id = $data->id;
        $this->dispatch('showEditModal');
    }

    public function updateData()
    {
        $this->validate([
            'category_id' => 'required',
            'name' => 'required',
            'slug' => 'required',
        ]);

        $data = SubCategory::find($this->edit_id);
        $data->category_id = $this->category_id;
        $data->name = $this->name;
        $data->slug = $this->slug;
        $data->save();

        $this->resetInputs();
        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'Sub-category updated successfully']);
    }


    public function changeStatus($id)
    {
        $sub_category = SubCategory::find($id);
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
        $brand = SubCategory::find($this->delete_id);
        $brand->delete();
        $this->dispatch('sub_category_deleted');
        $this->delete_id = '';
    }
    
    public function render()
    {
        $categories = Category::where('status', 1)->get();
        $sub_categories = SubCategory::where('name', 'like', '%'.$this->searchTerm.'%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.category.sub-category-component', ['sub_categories'=>$sub_categories, 'categories'=>$categories])->layout('livewire.admin.layouts.base');
    }
}
