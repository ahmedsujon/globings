<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sub_categories = [
            // 
            'Card/cash',
            'Gift vouchers',
            'Loyalty program',
            'Promotions',
            'low prices',
            'Student discount',
            'Clearance sale',
            'Bulk purchase discount',

            'Organic products',
            'Fairtrade products',
            'Local products',
            'Seasonal products',
            'Bulk purchase',
            'Recycling of batteries',
            'glass bottles',

            'Sports nutrition',
            'Halal',
            'Vegetarian',
            'Vegan',
            'Gluten-free',
            'Lactose-free',


        ];

        foreach ($sub_categories as $key => $sub_category) {
            $faker = Faker::create();

            $cat = new SubCategory();
            $cat->category_id = $faker->numberBetween(1, 14);
            $cat->name = $sub_category;
            $cat->slug = Str::slug($sub_category);
            $cat->status = 1;
            $cat->save();
        }
    }
}
