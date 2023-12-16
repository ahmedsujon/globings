<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class SubSubCategoryComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;

    public $edit_id, $delete_id;
    public $category_id, $sub_category_id, $level, $name, $slug, $status, $avatar, $uploadedAvatar;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeData()
    {
        $this->validate([
            'category_id' => 'required',
            'name' => 'required',
            'slug' => 'required',
        ]);

        $data = new Category();
        $data->parent_id = $this->sub_category_id;
        $data->level = 2;
        $data->name = $this->name;
        $data->slug = $this->slug;
        $data->save();

        $this->resetInputs();
        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'New sub-sub-category added successfully']);
    }

    public function editData($id)
    {
        $data = Category::find($id);
        $this->sub_category_id = $data->parent_id;
        $this->level = 2;
        $this->name = $data->name;
        $this->slug = $data->slug;
        $this->edit_id = $data->id;
        $this->dispatch('showEditModal');
    }

    public function updateData()
    {
        $this->validate([
            'sub_category_id' => 'required',
            'level' => 'required',
            'name' => 'required',
            'slug' => 'required',
        ]);

        $data = Category::find($this->edit_id);
        $data->parent_id = $this->sub_category_id;
        $data->level = 2;
        $data->name = $this->name;
        $data->slug = $this->slug;
        $data->save();

        $this->resetInputs();
        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'Sub-sub-category updated successfully']);
    }

    public function changeStatus($id)
    {
        $sub_category = Category::find($id);
        if ($sub_category->status == 0) {
            $sub_category->status = 2;
        } else {
            $sub_category->status = 0;
        }
        $sub_category->save();
        $this->dispatch('success', ['message' => 'Status updated successfully']);
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->sub_category_id = '';
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
        $this->dispatch('sub_sub_category_deleted');
        $this->delete_id = '';
    }
    public function render()
    {
        $categories = Category::where('status', 1)->where('parent_id', 0)->get();

        $sub_categories = Category::where('status', 1)->where('level', 1)->where('parent_id', $this->category_id)->get();
        
        $sub_sub_categories = Category::where('name', 'like', '%' . $this->searchTerm . '%')->where('parent_id', '!=', 0)->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.category.sub-sub-category-component',
            [
                'categories' => $categories,
                'sub_categories' => $sub_categories,
                'sub_sub_categories' => $sub_sub_categories,
            ]
        )->layout('livewire.admin.layouts.base');
    }
}
