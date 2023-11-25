<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Food Sales', 'Restaurants', 'Beauty and Wellness', 'Culture and Leisure', 'Home and DIY', 'Jewelry and Watches', 'Automotive', 'Animals', 'Fitness and Sports', 'Clothing Shopping', 'Real Estate', 'Childcare Centers', 'Textile and Shoe Treatment', 'Parks and Gardens'];

        foreach ($categories as $key => $category) {
            $faker = Faker::create();

            $cat = new Category();
            $cat->name = $category;
            $cat->slug = Str::slug($category);
            $cat->icon = 'assets/app/icons/home_category_icon'. $key + 2 .'.svg';
            $cat->status = 1;
            $cat->save();
        }
    }
}
