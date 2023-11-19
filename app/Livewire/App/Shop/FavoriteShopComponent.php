<?php

namespace App\Livewire\App\Shop;

use App\Models\Shop;
use Livewire\Component;
use App\Models\Category;

class FavoriteShopComponent extends Component
{
    public $categories, $pagination_value = 50, $searchTerm;
    
    public function mount()
    {
        $this->categories = Category::where('status', 1)->orderBy('name', 'ASC')->get();
    }

    public function render()
    {
        $shops = Shop::orderBy('id', 'DESC')
        ->where('city', 'like', '%' . $this->searchTerm . '%')
        ->paginate($this->pagination_value);
        return view('livewire.app.shop.favorite-shop-component', ['shops'=>$shops])->layout('livewire.app.layouts.base');
    }
}
