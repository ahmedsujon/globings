<?php

namespace App\Livewire\App\Shop;

use App\Models\Category;
use App\Models\Shop;
use Livewire\Component;

class ShopSettingsComponent extends Component
{

    public $edit_id, $delete_id;
    public $name, $shop_category, $description, $avatar, $uploadedAvatar;

    public function updateShop()
    {
        $this->validate([
            'name' => 'required',
            'shop_category' => 'required',
            'description' => 'required',
            
        ]);

        $data = Shop::find($this->edit_id);
        $data->name = $this->name;
        $data->shop_category = $this->shop_category;
        $data->description = $this->description;
        $data->website_url = $this->website_url;
        // if ($this->avatar) {
        //     $fileName = uniqid() . Carbon::now()->timestamp . '.' . $this->avatar->extension();
        //     $this->avatar->storeAs('category', $fileName);
        //     $data->icon = 'uploads/category/' . $fileName;
        // } else {
        //     $data->icon = 'assets/images/avatar.png';
        // }

        $data->save();
        $this->resetInputs();
        $this->dispatch('success', ['message' => 'Category updated successfully']);
    }

    public function resetInputs()
    {
        $this->name = '';
        $this->shop_category = '';
        $this->description = '';
        $this->edit_id = '';
    }

    public function render()
    {
        $categories = Category::where('status', 1)->orderBy('name', 'DESC')->get();
        return view('livewire.app.shop.shop-settings-component', ['categories'=>$categories])->layout('livewire.app.layouts.base');
    }
}
