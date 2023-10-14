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
        $categories = ['Hairdressing', 'Grocery', 'Cafe Bar', "Butcher's shop", 'Fish Shop', 'Vegitables Shop'];

        foreach ($categories as $category) {
            $faker = Faker::create();

            $cat = new Category();
            $cat->name = $category;
            $cat->slug = Str::slug($category);
            $cat->icon = 'assets/images/category_icons/icon_' . $faker->unique(true)->numberBetween(1, 5).'.png';
            $cat->status = 1;
            $cat->save();
        }
    }
}
