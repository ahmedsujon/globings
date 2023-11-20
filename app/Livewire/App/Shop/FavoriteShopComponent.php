<?php

namespace App\Livewire\App\Shop;

use App\Models\Category;
use App\Models\Shop;
use App\Models\ShopBookmark;
use Livewire\Component;

class FavoriteShopComponent extends Component
{
    public $categories, $pagination_value = 50, $searchTerm;

    public function mount()
    {
        $this->categories = Category::where('status', 1)->orderBy('name', 'ASC')->get();
    }

    public function render()
    {
        $bookmarks = ShopBookmark::where('user_id', user()->id)->pluck('shop_id')->toArray();

        $shops = Shop::whereIn('id', $bookmarks)->orderBy('id', 'DESC')->where('city', 'like', '%' . $this->searchTerm . '%')->paginate($this->pagination_value);
        return view('livewire.app.shop.favorite-shop-component', ['shops' => $shops])->layout('livewire.app.layouts.base');
    }
}
