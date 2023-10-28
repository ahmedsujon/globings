<?php

namespace App\Livewire\App\Shop;
use App\Models\Category;
use Livewire\Component;

class ShopsComponent extends Component
{
    public $categories, $pagination_value = 50, $search_term;

    public function mount()
    {
        $this->search_term = request()->get('search');
        $this->categories = Category::where('status', 1)->orderBy('name', 'ASC')->get();
    }

    public function render()
    {
        return view('livewire.app.shop.shops-component')->layout('livewire.app.layouts.base');
    }
}
