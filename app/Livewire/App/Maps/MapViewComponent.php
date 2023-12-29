<?php

namespace App\Livewire\App\Maps;

use App\Models\Category;
use App\Models\Shop;
use Livewire\Component;

class MapViewComponent extends Component
{
    public function mount()
    {

    }

    public function render()
    {
        // $city = request()->get('city');
        // $category = request()->get('category');
        $search_term = request()->get('search_value');
        $city = request()->get('city');

        $shops = Shop::select('id', 'name', 'latitude', 'longitude', 'cover_photo', 'category_id')->where('latitude', '!=', '')->where('longitude', '!=', '');

        if ($city) {
            $shops = $shops->where('city', 'like', '%' . $city . '%');
        }

        // if ($category) {
        //     $shops = $shops->where('category_id', $category);
        // }

        if ($search_term) {
            $shops = $shops->where(function ($query) use ($search_term) {
                $query->where('name', 'like', '%' . $search_term . '%')
                    ->orWhere('shop_category', 'like', '%' . $search_term . '%')
                    ->orWhere('sub_category', 'like', '%' . $search_term . '%')
                    ->orWhere('sub_sub_category', 'like', '%' . $search_term . '%');
            });
        }

        $shops = $shops->get();

        $cords = [];

        foreach ($shops as $shop) {
            $category = Category::find($shop->category_id);

            $icon = isset($category->icon) ? $category->icon : 'assets/images/placeholder.jpg';

            $cords[] = ["$shop->name", (Double) $shop->latitude, (Double) $shop->longitude, "$icon", $shop->id];
        }
        $shop_cords = $cords;

        $categories = Category::where('status', 1)->where('parent_id', 0)->orderBy('name', 'ASC')->get();
        $filter_cities = Shop::groupBy('city')->orderBy('city', 'ASC')->get();

        return view('livewire.app.maps.map-view-component', ['shop_cords' => json_encode($shop_cords), 'shops' => $shops, 'categories' => $categories, 'filter_cities' => $filter_cities])->layout('livewire.app.layouts.base');
    }
}
