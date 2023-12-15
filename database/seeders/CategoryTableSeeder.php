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
                    [
                        'name' => 'Card/cash',
                        'sub_sub_categories' => ['cat_1', 'cat_2'],
                    ],
                    [
                        'name' => 'Gift vouchers',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Loyalty program',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Promotions',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'low prices',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Student discount',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Clearance sale',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Organic products',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Fairtrade products',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Local products',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Seasonal products',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Bulk purchase',
                        'sub_sub_categories' => [],
                    ],
                ],
            ],
            [
                'category' => 'Restaurants',
                'sub_categories' => [
                    [
                        'name' => 'Traditional',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Fast food',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Gourmet',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Regional',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Molecular',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'American',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Chinese',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Korean',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Spanish',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Halal',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Terrace',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Toilets',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Website',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Takeout',
                        'sub_sub_categories' => [],
                    ],
                    [
                        'name' => 'Delivery',
                        'sub_sub_categories' => [],
                    ],
                ],
            ],
            [
                'category' => 'Beauty and Wellness',
                'sub_categories' => [
                    [
                        'name' => 'Beauty salons',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Tattoo parlors',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Spas',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Natural',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Men',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Women',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Mixed',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Children',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Free Wi-Fi',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Wardrobe',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Kids corner',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Parking',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Waiting area',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Toilets',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Opening hours',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'E-shop',
                        'sub_sub_categories' => []
                    ],
                ],
            ],
            [
                'category' => 'Culture and Leisure',
                'sub_categories' => [
                    [
                        'name' => 'Card',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Cash',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Student discount',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Subscription',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Free entry',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Premieres',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => '3D/4DX option',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Marathons',
                        'sub_sub_categories' => []
                    ],
                ],
            ],
            [
                'category' => 'Home and DIY',
                'sub_categories' => [
                    [
                        'name' => 'Card/cash',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Gift cards',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Loyalty program',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'With guarantees',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Promotions',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Price range',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Paints',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Moldings',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Parquet flooring',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'PVC coverings',
                        'sub_sub_categories' => []
                    ],
                ],
            ],
            [
                'category' => 'Jewelry and Watches',
                'sub_categories' => [
                    [
                        'name' => 'Card/cash',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Price range',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Student discount',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Repair',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Engraving',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Piercing',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Bead threading',
                        'sub_sub_categories' => []
                    ],
                ],
            ],
            [
                'category' => 'Automotive',
                'sub_categories' => [
                    [
                        'name' => 'Card/cash',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Discounts',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Loyalty program',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Price range',
                        'sub_sub_categories' => []
                    ],
                ],
            ],
            [
                'category' => 'Animals',
                'sub_categories' => [
                    [
                        'name' => 'Groomers',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Veterinary clinics',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Pet food',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Pet houses',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Cat trees',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Mats',
                        'sub_sub_categories' => []
                    ],
                ],
            ],
            [
                'category' => 'Fitness and Sports',
                'sub_categories' => [
                    [
                        'name' => 'Ladies-only',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Opening hours',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Parking',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Open 24/7',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Website',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Large facility',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Small facility',
                        'sub_sub_categories' => []
                    ],
                ],
            ],
            [
                'category' => 'Clothing Shopping',
                'sub_categories' => [
                    [
                        'name' => 'Cash payment',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Gift card',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Loyalty card',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Price range',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Men',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Women',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Pregnant women',
                        'sub_sub_categories' => []
                    ],
                ],
            ],
            [
                'category' => 'Real Estate',
                'sub_categories' => [
                    [
                        'name' => 'Price range',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Promotions',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Notary',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Real estate sales',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Evaluation',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'House clearance',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Property developers',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Home assessment',
                        'sub_sub_categories' => []
                    ],
                ],
            ],
            [
                'category' => 'Childcare Centers',
                'sub_categories' => [
                    [
                        'name' => 'Ecological laundry',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'At-home service',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Cobbler',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Parking',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Opening hours',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Website/E-shop',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Delivery',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'In-store pickup',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Mondial Relay',
                        'sub_sub_categories' => []
                    ],
                ],
            ],
            [
                'category' => 'Textile and Shoe Treatment',
                'sub_categories' => [
                    [
                        'name' => 'Card/cash',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Price range',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Student discount',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Transformation',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Ironing',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Automatic laundry',
                        'sub_sub_categories' => []
                    ],
                ],
            ],
            [
                'category' => 'Parks and Gardens',
                'sub_categories' => [
                    [
                        'name' => 'Free admission',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Price ranges',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Student discount',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Discounts',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Public gardens',
                        'sub_sub_categories' => []
                    ],
                    [
                        'name' => 'Greenhouses',
                        'sub_sub_categories' => []
                    ],
                ],
            ],
        ];

        foreach ($categories as $key => $main_category) {
            $cat = new Category();
            $cat->level = 0;
            $cat->name = $main_category['category'];
            $cat->slug = Str::slug($main_category['category']);
            $cat->icon = 'assets/app/icons/home_category_icon' . $key + 2 . '.svg';
            $cat->status = 1;
            $cat->save();

            foreach ($main_category['sub_categories'] as $sub_category) {
                $sub_cat = new Category();
                $sub_cat->level = 1;
                $sub_cat->parent_id = $cat->id;
                $sub_cat->name = $sub_category['name'];
                $sub_cat->slug = Str::slug($sub_category['name']);
                $sub_cat->icon = 'assets/images/placeholder.jpg';
                $sub_cat->status = 1;
                $sub_cat->save();
                foreach ($sub_category['sub_sub_categories'] as $sub_sub_category) {
                    $sub_sub_cat = new Category();
                    $sub_sub_cat->level = 2;
                    $sub_sub_cat->parent_id = $sub_cat->id;
                    $sub_sub_cat->name = $sub_sub_category;
                    $sub_sub_cat->slug = Str::slug($sub_sub_category);
                    $sub_sub_cat->icon = 'assets/images/placeholder.jpg';
                    $sub_sub_cat->status = 1;
                    $sub_sub_cat->save();

                }
            }
        }
    }
}
