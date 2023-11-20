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
        $city = request()->get('city');
        $category = request()->get('category');

        $shops = Shop::select('id', 'name', 'latitude', 'longitude', 'cover_photo')->where('latitude', '!=', '')->where('longitude', '!=', '');

        if ($city) {
            $shops = $shops->where('city', 'like', '%' . $city . '%');
        }

        if ($category) {
            $shops = $shops->where('category_id', $category);
        }

        $shops = $shops->get();

        $cords = [];

        foreach ($shops as $shop) {
            $cords[] = ["$shop->name", (Double) $shop->latitude, (Double) $shop->longitude, $shop->id];
        }
        $shop_cords = $cords;

        $categories = Category::where('status', 1)->orderBy('name', 'ASC')->get();
        $filter_cities = Shop::groupBy('city')->orderBy('city', 'ASC')->get();

        return view('livewire.app.maps.map-view-component', ['shop_cords' => json_encode($shop_cords), 'shops' => $shops, 'categories' => $categories, 'filter_cities' => $filter_cities])->layout('livewire.app.layouts.base');
    }
}
