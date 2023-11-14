<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shopOne = Shop::where('name', 'Bookshop')->first();
        $shopTwo = Shop::where('name', 'Grocery')->first();
        $shopThree = Shop::where('name', 'Electronics')->first();
        $shopFour = Shop::where('name', 'Boutique')->first();
        $shopFive = Shop::where('name', 'Nursery')->first();
        $shopSix = Shop::where('name', 'Deli')->first();
        $shopSeven = Shop::where('name', 'Sports')->first();
        $shopEight = Shop::where('name', 'Art')->first();
        $shopNine = Shop::where('name', 'Pet')->first();
        $shopTen = Shop::where('name', 'Wellness')->first();


        if (!$shopOne) {
            $shop = new Shop();
            $shop->user_id = 1;
            $shop->category_id = rand(1, 10);
            $shop->name = 'Bookshop';
            $shop->shop_category = 'Bookstore';
            $shop->description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit';
            $shop->profile_image = 'assets/images/avatar.png';
            $shop->cover_photo = 'assets/images/placeholder-rect.jpg';
            $shop->latitude = '23.751597323202727';
            $shop->longitude = '90.40795872491326';
            $shop->city = 'New York City';
            $shop->address = '452/1, Greenway Road, Peyarabag, Mogbazar, Dhaka, Bangladesh';
            $shop->visited = 5000;
            $shop->save();
        }
        if (!$shopTwo) {
            $shop = new Shop();
            $shop->user_id = 2;
            $shop->category_id = rand(1, 10);
            $shop->name = 'Grocery';
            $shop->shop_category = 'Grocery Store';
            $shop->description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit';
            $shop->profile_image = 'assets/images/avatar.png';
            $shop->cover_photo = 'assets/images/placeholder-rect.jpg';
            $shop->latitude = '23.751597323202727';
            $shop->longitude = '90.40795872491326';
            $shop->city = 'Tokyo';
            $shop->address = '452/1, Greenway Road, Peyarabag, Mogbazar, Dhaka, Bangladesh';
            $shop->visited = 5000;
            $shop->save();
        }
        if (!$shopThree) {
            $shop = new Shop();
            $shop->user_id = 3;
            $shop->category_id = rand(1, 10);
            $shop->name = 'Electronics';
            $shop->shop_category = 'Electronics Store';
            $shop->description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit';
            $shop->profile_image = 'assets/images/avatar.png';
            $shop->cover_photo = 'assets/images/placeholder-rect.jpg';
            $shop->latitude = '23.751597323202727';
            $shop->longitude = '90.40795872491326';
            $shop->city = 'London';
            $shop->address = '452/1, Greenway Road, Peyarabag, Mogbazar, Dhaka, Bangladesh';
            $shop->visited = 5000;
            $shop->save();
        }
        if (!$shopFour) {
            $shop = new Shop();
            $shop->user_id = 4;
            $shop->category_id = rand(1, 10);
            $shop->name = 'Boutique';
            $shop->shop_category = 'Clothing Store';
            $shop->description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit';
            $shop->profile_image = 'assets/images/avatar.png';
            $shop->cover_photo = 'assets/images/placeholder-rect.jpg';
            $shop->latitude = '23.751597323202727';
            $shop->longitude = '90.40795872491326';
            $shop->city = 'Paris';
            $shop->address = '452/1, Greenway Road, Peyarabag, Mogbazar, Dhaka, Bangladesh';
            $shop->visited = 5000;
            $shop->save();
        }
        if (!$shopFive) {
            $shop = new Shop();
            $shop->user_id = 5;
            $shop->category_id = rand(1, 10);
            $shop->name = 'Nursery';
            $shop->shop_category = 'Garden Center';
            $shop->description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit';
            $shop->profile_image = 'assets/images/avatar.png';
            $shop->cover_photo = 'assets/images/placeholder-rect.jpg';
            $shop->latitude = '23.751597323202727';
            $shop->longitude = '90.40795872491326';
            $shop->city = 'Sydney';
            $shop->address = '452/1, Greenway Road, Peyarabag, Mogbazar, Dhaka, Bangladesh';
            $shop->visited = 5000;
            $shop->save();
        }
        if (!$shopSix) {
            $shop = new Shop();
            $shop->user_id = 6;
            $shop->category_id = rand(1, 10);
            $shop->name = 'Deli';
            $shop->shop_category = 'Food Store';
            $shop->description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit';
            $shop->profile_image = 'assets/images/avatar.png';
            $shop->cover_photo = 'assets/images/placeholder-rect.jpg';
            $shop->latitude = '23.751597323202727';
            $shop->longitude = '90.40795872491326';
            $shop->city = 'Rio de Janeiro';
            $shop->address = '452/1, Greenway Road, Peyarabag, Mogbazar, Dhaka, Bangladesh';
            $shop->visited = 5000;
            $shop->save();
        }
        if (!$shopSeven) {
            $shop = new Shop();
            $shop->user_id = 7;
            $shop->category_id = rand(1, 10);
            $shop->name = 'Sports';
            $shop->shop_category = 'Sporting Goods';
            $shop->description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit';
            $shop->profile_image = 'assets/images/avatar.png';
            $shop->cover_photo = 'assets/images/placeholder-rect.jpg';
            $shop->latitude = '23.751597323202727';
            $shop->longitude = '90.40795872491326';
            $shop->city = 'Cairo';
            $shop->address = '452/1, Greenway Road, Peyarabag, Mogbazar, Dhaka, Bangladesh';
            $shop->visited = 5000;
            $shop->save();
        }
        if (!$shopEight) {
            $shop = new Shop();
            $shop->user_id = 8;
            $shop->category_id = rand(1, 10);
            $shop->name = 'Art';
            $shop->shop_category = 'Art Supplies';
            $shop->description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit';
            $shop->profile_image = 'assets/images/avatar.png';
            $shop->cover_photo = 'assets/images/placeholder-rect.jpg';
            $shop->latitude = '23.751597323202727';
            $shop->longitude = '90.40795872491326';
            $shop->city = 'Mumbai';
            $shop->address = '452/1, Greenway Road, Peyarabag, Mogbazar, Dhaka, Bangladesh';
            $shop->visited = 5000;
            $shop->save();
        }
        if (!$shopNine) {
            $shop = new Shop();
            $shop->user_id = 9;
            $shop->category_id = rand(1, 10);
            $shop->name = 'Pet';
            $shop->shop_category = 'Pet Store';
            $shop->description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit';
            $shop->profile_image = 'assets/images/avatar.png';
            $shop->cover_photo = 'assets/images/placeholder-rect.jpg';
            $shop->latitude = '23.751597323202727';
            $shop->longitude = '90.40795872491326';
            $shop->city = 'Toronto';
            $shop->address = '452/1, Greenway Road, Peyarabag, Mogbazar, Dhaka, Bangladesh';
            $shop->visited = 5000;
            $shop->save();
        }
        if (!$shopTen) {
            $shop = new Shop();
            $shop->user_id = 10;
            $shop->category_id = rand(1, 10);
            $shop->name = 'Wellness';
            $shop->shop_category = 'Health Store';
            $shop->description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit';
            $shop->profile_image = 'assets/images/avatar.png';
            $shop->cover_photo = 'assets/images/placeholder-rect.jpg';
            $shop->latitude = '23.751597323202727';
            $shop->longitude = '90.40795872491326';
            $shop->city = 'Los Angeles';
            $shop->address = '452/1, Greenway Road, Peyarabag, Mogbazar, Dhaka, Bangladesh';
            $shop->visited = 5000;
            $shop->save();
        }
    }
}
