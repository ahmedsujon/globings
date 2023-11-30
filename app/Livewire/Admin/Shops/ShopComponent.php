<?php

namespace App\Livewire\Admin\Shops;

use App\Models\Shop;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;

    public function render()
    {
        $shops = Shop::where('name', 'like', '%'.$this->searchTerm.'%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.shops.shop-component', ['shops'=>$shops])->layout('livewire.admin.layouts.base');
    }
}
