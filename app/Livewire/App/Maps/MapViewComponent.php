<?php

namespace App\Livewire\App\Maps;

use App\Models\Shop;
use Livewire\Component;
use PhpParser\Node\Expr\Cast\Double;

class MapViewComponent extends Component
{
    public function mount(){

    }

    public function render()
    {
        $search_value = request()->get('search');

        $shops = Shop::select('id', 'name', 'latitude', 'longitude', 'cover_photo')->where('name', 'like', '%'. $search_value .'%')->where('latitude', '!=', '')->where('longitude', '!=', '')->get();

        $cords = [];

        foreach ($shops as $shop) {
            $cords[] = ["$shop->name", (Double) $shop->latitude, (Double) $shop->longitude, $shop->id];
        }
        $shop_cords = $cords;


        return view('livewire.app.maps.map-view-component', ['shop_cords'=>json_encode($shop_cords), 'shops'=>$shops])->layout('livewire.app.layouts.base');
    }
}
