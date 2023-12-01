<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'category' => 'Food Sales',
                'sub_categories' => [
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
                ],
            ],
            [
                'category' => 'Restaurants',
                'sub_categories' => [
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
                ],
            ],
            [
                'category' => 'Beauty and Wellness',
                'sub_categories' => [
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
                ],
            ],
            [
                'category' => 'Culture and Leisure',
                'sub_categories' => [
                    'Card',
                    'Cash',
                    'Student discount',
                    'Subscription',
                    'Free entry',
                    'Premieres',
                    '3D/4DX option',
                    'Marathons',
                ],
            ],
            [
                'category' => 'Home and DIY',
                'sub_categories' => [
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
                ],
            ],
            [
                'category' => 'Jewelry and Watches',
                'sub_categories' => [
                    'Card/cash',
                    'Price range',
                    'Student discount',
                    'Repair',
                    'Engraving',
                    'Piercing',
                    'Bead threading',
                ],
            ],
            [
                'category' => 'Automotive',
                'sub_categories' => [
                    'Card/cash',
                    'Discounts',
                    'Loyalty program',
                    'Price range',
                ],
            ],
            [
                'category' => 'Animals',
                'sub_categories' => [
                    'Groomers',
                    'Veterinary clinics',
                    'Pet food',
                    'Pet houses',
                    'Cat trees',
                    'Mats',
                ],
            ],
            [
                'category' => 'Fitness and Sports',
                'sub_categories' => [
                    'Ladies-only',
                    'Opening hours',
                    'Parking',
                    'Open 24/7',
                    'Website',
                    'Large facility',
                    'Small facility',
                ],
            ],
            [
                'category' => 'Clothing Shopping',
                'sub_categories' => [
                    'Cash payment',
                    'Gift card',
                    'Loyalty card',
                    'Price range',
                    'Men',
                    'Women',
                    'Pregnant women',
                ],
            ],
            [
                'category' => 'Real Estate',
                'sub_categories' => [
                    'Price range',
                    'Promotions',
                    'Notary',
                    'Real estate sales',
                    'Evaluation',
                    'House clearance',
                    'Property developers',
                    'Home assessment',
                ],
            ],
            [
                'category' => 'Childcare Centers',
                'sub_categories' => [
                    'Ecological laundry',
                    'At-home service',
                    'Cobbler',
                    'Parking',
                    'Opening hours',
                    'Website/E-shop',
                    'Delivery',
                    'In-store pickup',
                    'Mondial Relay',
                ],
            ],
            [
                'category' => 'Textile and Shoe Treatment',
                'sub_categories' => [
                    'Card/cash',
                    'Price range',
                    'Student discount',
                    'Transformation',
                    'Ironing',
                    'Automatic laundry',
                ],
            ],
            [
                'category' => 'Parks and Gardens',
                'sub_categories' => [
                    'Free admission',
                    'Price ranges',
                    'Student discount',
                    'Discounts',
                    'Public gardens',
                    'Greenhouses',
                ],
            ],
        ];

        foreach ($categories as $key => $main_category) {
            $cat = new Category();
            $cat->name = $main_category['category'];
            $cat->slug = Str::slug($main_category['category']);
            $cat->icon = 'assets/app/icons/home_category_icon' . $key + 2 . '.svg';
            $cat->status = 1;
            $cat->save();

            foreach ($main_category['sub_categories'] as $sub_category) {
                $sub_cat = new Category();
                $sub_cat->parent_id = $cat->id;
                $sub_cat->name = $sub_category;
                $sub_cat->slug = Str::slug($sub_category);
                $sub_cat->icon = 'assets/images/placeholder.jpg';
                $sub_cat->status = 1;
                $sub_cat->save();
            }
        }
    }
}
