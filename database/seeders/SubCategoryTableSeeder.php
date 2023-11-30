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
            // Food Sales
            'Card/cash',
            'Gift vouchers',
            'Loyalty program',
            'Promotions',
            'low prices',
            'Student discount',
            'Clearance sale',
            'Organic products',
            'Fairtrade products',
            'Local products',
            'Seasonal products',
            'Bulk purchase',
            // Restaurants 
            'Traditional',
            'Fast food',
            'Gourmet',
            'Regional',
            'Molecular',
            'American',
            'Chinese',
            'Korean',
            'Spanish',
            'Halal',
            'Terrace',
            'Toilets',
            'Website',
            'Takeout',
            'Delivery',
            // Beauty and Wellness 
            'Beauty salons',
            'Tattoo parlors',
            'Spas',
            'Natural',
            'Men',
            'Women',
            'Mixed',
            'Children',
            'Free Wi-Fi',
            'Wardrobe',
            'Kids corner',
            'Parking',
            'Waiting area',
            'Toilets',
            'Opening hours',
            'E-shop',
            // Culture and Leisure 
            'Card',
            'Cash',
            'Student discount',
            'Subscription',
            'Free entry',
            'Premieres',
            '3D/4DX option',
            'Marathons',
            // Home and DIY 
            'Card/cash',
            'Gift cards',
            'Loyalty program',
            'With guarantees',
            'Promotions',
            'Price range',
            'Paints',
            'Moldings',
            'Parquet flooring',
            'PVC coverings',
            // •	Jewelry and Watches 
            'Card/cash',
            'Price range',
            'Student discount',
            'Repair',
            'Engraving',
            'Piercing',
            'Bead threading',
            // •	Fitness and Sports 
            'Ladies-only',
            'Opening hours',
            'Parking',
            'Open 24/7',
            'Website',
            'Large facility',
            'Small facility',
            // •	Clothing Shopping 
            'Cash payment',
            'Gift card',
            'Loyalty card',
            'Price range',
            'Men',
            'Women',
            'Pregnant women',
            // •	Real Estate 
            'Price range',
            'Promotions',
            'Notary',
            'Real estate sales',
            'Evaluation',
            'House clearance',
            'Property developers',
            'Home assessment',
            // •	Childcare Centers 
            'Ecological laundry',
            'At-home service',
            'Cobbler',
            'Parking',
            'Opening hours',
            'Website/E-shop',
            'Delivery',
            'In-store pickup',
            'Mondial Relay',
            // •	Parks and Gardens 
            'Free admission',
            'Price ranges',
            'Student discount',
            'Discounts',
            'Public gardens',
            'Greenhouses',
            // •	Textile and Shoe Treatment 
            'Card/cash',
            'Price range',
            'Student discount',
            'Transformation',
            'Ironing',
            'Automatic laundry',
            // •	Animals 
            'Groomers',
            'Veterinary clinics',
            'Pet food',
            'Pet houses',
            'Cat trees',
            'Mats',
            // •	Automotive 
            'Card/cash',
            'Discounts',
            'Loyalty program',
            'Price range',
            // •	Healthcare  
            'Card/cash',
            'Medical centers',
            'Public hospitals',
            'Clinics',

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
