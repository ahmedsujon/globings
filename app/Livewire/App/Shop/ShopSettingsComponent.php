<?php

namespace App\Livewire\App\Shop;

use Carbon\Carbon;
use App\Models\Shop;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class ShopSettingsComponent extends Component
{
    use WithFileUploads;

    public $edit_id, $delete_id, $user_id;
    public $name, $shop_category, $shop_sub_category, $website_url, $description, $avatar, $uploadedAvatar, $coverImage, $latitude, $longitude, $city, $address, $bings_discount;

    public function mount()
    {
        $data = Shop::where('user_id', user()->id)->first();
        $this->name = $data->name;
        $this->shop_category = $data->category_id;
        $this->website_url = $data->website_url;
        $this->description = $data->description;
        $this->bings_discount = $data->bings_discount;
        $this->edit_id = $data->id;
    }

    public function updatedCoverImage()
    {
        if ($this->coverImage) {
            $fileName = uniqid() . Carbon::now()->timestamp . '.' . $this->coverImage->extension();
            $this->coverImage->storeAs('category', $fileName);
            $image_path = 'uploads/category/' . $fileName;

            $shop = Shop::where('user_id', user()->id)->first();
            $shop->cover_photo = $image_path;
            $shop->save();
            $this->dispatch('success', ['message' => 'Cover photo updated successfully']);
        }
    }

    public function editData($id)
    {
        $data = Shop::where('user_id', user()->id)->first();
        $this->name = $data->name;
        $this->shop_category = $data->category_id;
        $this->website_url = $data->website_url;
        $this->description = $data->description;
        $this->bings_discount = $data->bings_discount;
        $this->edit_id = $data->id;
    }

    public function updateShop()
    {
        $this->validate([
            'name' => 'required',
            'shop_category' => 'required',
            'description' => 'required',
            'bings_discount' => 'required',
        ]);

        $data = Shop::where('user_id', user()->id)->first();
        $data->name = $this->name;
        $data->category_id = $this->shop_category;
        $data->shop_category = Category::find($this->shop_category)->name;
        $data->description = $this->description;
        $data->website_url = $this->website_url;
        $data->latitude = $this->latitude;
        $data->longitude = $this->longitude;
        $data->city = $this->city;
        $data->address = $this->address;
        $data->bings_discount = $this->bings_discount;
        $data->save();

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
        $categories = Category::where('status', 1)->where('parent_id', 0)->orderBy('name', 'DESC')->get();
        return view('livewire.app.shop.shop-settings-component', ['categories'=>$categories, 'shop'=>$shop])->layout('livewire.app.layouts.base');
    }
}
