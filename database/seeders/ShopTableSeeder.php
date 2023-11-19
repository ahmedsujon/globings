<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $shops_array = ["Bookshop", "Grocery", "Electronics", "Boutique", "Nursery", "Deli", "Sports", "Art", "Pet", "Wellness"];

        $cords = ["25.090281, 90.195419", "25.087653, 90.190419", "25.088663, 90.186468", "25.085865, 90.187842", "25.097058, 90.185437", "25.091617, 90.199952", "25.102499, 90.177983", "25.084466, 90.181848", "25.086543, 90.189930", "25.086621, 90.190918", "25.091902, 90.191529", "25.092869, 90.191985"];

        foreach ($shops_array as $key => $shop_ar) {
            $category = Category::inRandomOrder()->first();

            $shop = new Shop();
            $shop->user_id = $key + 1;
            $shop->category_id = $category->id;
            $shop->name = $shop_ar;
            $shop->shop_category = $category->name;
            $shop->description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit';
            $shop->profile_image = 'assets/images/placeholder.jpg';
            $shop->cover_photo = 'assets/images/placeholder-rect.jpg';
            $shop->latitude = (explode(',', $cords[$key]))[0];
            $shop->longitude = (explode(',', $cords[$key]))[1];
            $shop->city = 'Nalitabari';
            $shop->address = 'Nalitabari 2110, Dhaka, Bangladesh';
            $shop->visited = 0;
            $shop->save();
        }
    }
}
