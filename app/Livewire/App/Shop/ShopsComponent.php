<?php

namespace App\Livewire\App\Shop;

use App\Models\Category;
use App\Models\Shop;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShopsComponent extends Component
{
    public $categories, $pagination_value = 50, $filter_cities;
    public $phone, $edit_id;
    use WithPagination;

    public function mount()
    {
        $this->categories = Category::where('status', 1)->where('parent_id', 0)->orderBy('name', 'ASC')->get();
        $this->filter_cities = Shop::groupBy('city')->orderBy('city', 'ASC')->get();
    }

    public function updatePhone()
    {
        $this->validate([
            'phone' => 'required',
        ]);

        $data = User::find($this->edit_id);
        $data->phone = $this->phone;
        $data->save();
    }

    public function render()
    {
        $city = request()->get('city');
        $categories = request()->get('categories');
        $search_term = request()->get('search_value');

        $shops = Shop::where(function ($query) use($search_term) {
            $query->where('name', 'like', '%' . $search_term . '%')
                ->orWhere('shop_category', 'like', '%' . $search_term . '%')
                ->orWhere('shop_sub_category', 'like', '%' . $search_term . '%');
        })->orderBy('id', 'DESC');

        if ($city && $city != 'all') {
            $shops = $shops->where('city', 'like', '%' . $city . '%');
        }

        if ($categories) {
            $shops = $shops->whereIn('category_id', $categories);
        }

        $shops = $shops->paginate($this->pagination_value);

        return view('livewire.app.shop.shops-component', ['shops' => $shops])->layout('livewire.app.layouts.base');
    }
}
