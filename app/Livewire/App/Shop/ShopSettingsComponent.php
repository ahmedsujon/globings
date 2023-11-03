<?php

namespace App\Livewire\App\Shop;

use App\Models\Category;
use App\Models\Shop;
use Livewire\Component;

class ShopSettingsComponent extends Component
{
    public $edit_id, $delete_id, $user_id;
    public $name, $shop_category, $website_url, $description, $avatar, $uploadedAvatar;

    // public function mount($id)
    // {
    //     $data = Shop::where('user_id', user()->id)->first();
    //     $this->name = $data->name;
    //     $this->shop_category = $data->shop_category;
    //     $this->website_url = $data->website_url;
    //     $this->description = $data->description;
    //     $this->edit_id = $data->id;
    // }

    public function editData($id)
    {
        $data = Shop::where('user_id', user()->id)->first();
        $this->name = $data->name;
        $this->shop_category = $data->shop_category;
        $this->website_url = $data->website_url;
        $this->description = $data->description;
        $this->edit_id = $data->id;
    }

    public function updateShop()
    {
        $this->validate([
            'name' => 'required',
            'shop_category' => 'required',
            'description' => 'required',
        ]);

        $data = Shop::where('user_id', user()->id)->first();
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
        $this->dispatch('success', ['message' => 'Shop updated successfully']);
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
        $shop = Shop::where('user_id', user()->id)->first();
        $categories = Category::where('status', 1)->orderBy('name', 'DESC')->get();
        return view('livewire.app.shop.shop-settings-component', ['categories'=>$categories, 'shop'=>$shop])->layout('livewire.app.layouts.base');
    }
}
