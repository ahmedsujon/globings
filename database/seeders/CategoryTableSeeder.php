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
                'category' => 'Restaurants',
                'icon' => 'assets/images/icons/restaurant.svg',
                'sub_categories' => [
                    [
                        'name' => 'Cuisine Types',
                        'sub_sub_categories' => [
                            'Special beers and spirits',
                            'Traditional',
                            'Fast food',
                            'Gourmet',
                            'Regional',
                            'Molecular'
                        ],
                    ],
                    [
                        'name' => 'By Country',
                        'sub_sub_categories' => [
                            'American',
                            'Chinese',
                            'Korean',
                            'Spanish',
                            'French',
                            'Indian',
                            'Italian',
                            'Japanese',
                            'Maghreb',
                            'Mexican',
                            'Lebanese',
                            'Thai',
                            'Turkish'
                        ],
                    ],
                    [
                        'name' => 'Themes and Concepts',
                        'sub_sub_categories' => [
                            'Dinner and concert',
                            'Breakfast',
                            'Brunch',
                            'Bars',
                            'Buffet',
                            'Shisha bar',
                            'Cat café and bar'
                        ],
                    ],
                    [
                        'name' => 'Rice, Offers, and Benefits',
                        'sub_sub_categories' => [
                            'Card/cash',
                            'Student discount',
                            'Gift vouchers and meal vouchers',
                            'Happy hours',
                            'Price range'
                        ],
                    ],
                    [
                        'name' => 'Other Offers and Services',
                        'sub_sub_categories' => [
                            'Free Wi-Fi',
                            'Electrical outlets',
                            'Sports event broadcasting',
                            'Private room for special occasions'
                        ],
                    ],
                    [
                        'name' => 'Dietary Options',
                        'sub_sub_categories' => [
                            'Halal',
                            'Vegetarian',
                            'Vegan',
                            'Gluten-free',
                        ],
                    ],
                    [
                        'name' => 'Opening Hours and Access',
                        'sub_sub_categories' => [
                            'Access for people with reduced mobility',
                            'Parking',
                            'Smoking area',
                            'Work/study space',
                            'Pets allowed',
                            'Terrace',
                            'Toilets',
                            'Opening hours',
                            'Website',
                            'Mobile application',
                        ],
                    ],
                    [
                        'name' => 'Additional Information',
                        'sub_sub_categories' => [
                            'Reservation required',
                            'Takeout',
                            'Delivery',
                        ],
                    ],
                ],
            ],
            [
                'category' => 'Beauty and Wellness',
                'icon' => 'assets/images/icons/beauty_wellness.svg',
                'sub_categories' => [
                    [
                        'name' => 'Price, Offers, and Benefits',
                        'sub_sub_categories' => [
                            'Card/cash',
                            'Student discount',
                            'Promotions and special days',
                            'Subscription',
                            'Gift vouchers'
                        ]
                    ],
                    [
                        'name' => 'Services Offered',
                        'sub_sub_categories' => [
                            'Hair coloring, highlights, balayage',
                            'Extensions/wig fitting',
                            'Perms and straightening',
                            'Shampoo/dry cleaning',
                            'Beard grooming',
                            'Deep treatments',
                            'Massages (slimming, Velashape)',
                            'Eyelashes and eyebrows',
                            'Waxing (wax and laser)',
                            'Tanning',
                            'Cosmetics/makeup',
                            'Manicure and pedicure',
                            'Radiofrequency and firming treatments',
                            'Henna dye/vegetable coloring',
                            'Natural shampoos',
                            'Essential oil treatments',
                            'Cruelty-free products'
                        ]
                    ],
                    [
                        'name' => 'Types',
                        'sub_sub_categories' => [
                            'Hair salons',
                            'Beauty salons',
                            'Tattoo parlors',
                            'Spas',
                            'Natural/organic treatment salons'
                        ]
                    ],
                    [
                        'name' => 'Target Audience',
                        'sub_sub_categories' => [
                            'Men',
                            'Women',
                            'Mixed',
                            'Children'
                        ]
                    ],
                    [
                        'name' => 'Other Offers and Services',
                        'sub_sub_categories' => [
                            'Free Wi-Fi',
                            'Wardrobe',
                            'Kids corner',
                            'Reading materials available',
                            'Tea and coffee (dining)',
                            'Sale of cosmetic products'
                        ]
                    ],
                    [
                        'name' => 'Opening Hours and Access',
                        'sub_sub_categories' => [
                            'Access for people with reduced mobility',
                            'Parking',
                            'Waiting area',
                            'Toilets',
                            'Opening hours',
                            'E-shop'
                        ]
                    ],
                    [
                        'name' => 'Additional Information',
                        'sub_sub_categories' => [
                            'At-home/at-work services',
                            'Single/multiple hairdressers'
                        ]
                    ],
                ],
            ],
            [
                'category' => 'Food Sales',
                'icon' => 'assets/images/icons/food_sales.svg',
                'sub_categories' => [
                    [
                        'name' => 'Price, Offers, and Benefits',
                        'sub_sub_categories' => ['Card/cash', 'Loyalty program', 'Promotions/low prices', 'Student discount', 'Clearance sale', 'Bulk purchase discount'],
                    ],
                    [
                        'name' => 'Organic and Fairtrade',
                        'sub_sub_categories' => ['Organic products', 'Local products', 'Seasonal products', 'Bulk purchase', 'Recycling of batteries', 'Glass bottles'],
                    ],
                    [
                        'name' => 'Dietary Options',
                        'sub_sub_categories' => ['Sports nutrition', 'Vegetarian', 'Vegan', 'Gluten-free', 'Lactose-free'],
                    ],
                    [
                        'name' => 'Products for Sale',
                        'sub_sub_categories' => [
                            'Tea/coffee/infusions',
                            'Juice/syrup',
                            'soft drinks/water',
                            'Chocolates',
                            'confectionery',
                            'Fruits and vegetables',
                            'Frozen foods',
                            'Ready-made meals',
                            'Frozen and fresh',
                            'Sandwiches',
                            'Butcher/charcuterie',
                            'Fishmonger',
                            'Cheese shop',
                            'Catering',
                            'Sweet/savory groceries',
                            'Desserts',
                            'Bakery/pastry shop',
                            'Pastries',
                            'Alcohol/tobacco',
                            'Dietary supplements'
                        ],
                    ],
                    [
                        'name' => 'Market Types',
                        'sub_sub_categories' => [
                            'Specialized supermarkets',
                            'Regional specialty sections',
                            'Artisanal shops',
                            'Independent stores',
                            'Chain stores'
                        ],
                    ],
                    [
                        'name' => 'Opening Hours and Access',
                        'sub_sub_categories' => [
                            'Access for people with reduced mobility',
                            'Parking',
                            'Open at night',
                            'On-site consumption',
                            'Terrace',
                            'Opening hours',
                            'E-shop',
                            'Mobile application'
                        ],
                    ],
                    [
                        'name' => 'Additional Information',
                        'sub_sub_categories' => [
                            'Delivery',
                            'In-store pickup',
                            'Relay point',
                            'Pre-order',
                            'Vacuum packaging'
                        ],
                    ],
                ],
            ],
            [
                'category' => 'Clothing Shopping',
                'icon' => 'assets/images/icons/clothing.svg',
                'sub_categories' => [
                    [
                        'name' => 'Price, Offers, and Benefits',
                        'sub_sub_categories' => [
                            'Cash payment',
                            'Gift card',
                            'Loyalty card',
                            'Discounts and promotions',
                            'Price range'
                        ]
                    ],
                    [
                        'name' => 'Intended Audience',
                        'sub_sub_categories' => [
                            'Men',
                            'Women',
                            'Pregnant women',
                            'Children',
                            'Babies',
                            'General public'
                        ]
                    ],
                    [
                        'name' => 'Products for Sale',
                        'sub_sub_categories' => [
                            'Sports clothing',
                            'Second-hand clothing',
                            'Plus-size clothing',
                            'Fair trade products',
                            'High-end shoes',
                            'Sneakers',
                            'Classic shoes',
                            'Recycled materials',
                            'Bags and accessories'
                        ]
                    ],
                    [
                        'name' => 'Product Styles',
                        'sub_sub_categories' => [
                            'Brand',
                            'Autumn-Winter collection',
                            'Spring-Summer collection'
                        ]
                    ],
                    [
                        'name' => 'Services Offered',
                        'sub_sub_categories' => [
                            'Fitting rooms',
                            'Returns'
                        ]
                    ],
                    [
                        'name' => 'Hours and Access',
                        'sub_sub_categories' => [
                            'Access for people with reduced mobility',
                            'Parking',
                            'Opening hours',
                            'Toilets',
                            'Elevators and escalators',
                            'Website/E-shop',
                            'Mobile application'
                        ]
                    ],
                    [
                        'name' => 'Additional Information',
                        'sub_sub_categories' => [
                            'Delivery',
                            'In-store pickup',
                            'Relay point',
                            'Pre-order'
                        ]
                    ],
                ],
            ],

            [
                'category' => 'Fitness and Sports',
                'icon' => 'assets/images/icons/fitness.svg',
                'sub_categories' => [
                    [
                        'name' => 'Price, Offers, and Benefits',
                        'sub_sub_categories' => [
                            'Card/cash',
                            'Discounts',
                            'Loyalty program',
                            'Price range',
                            'Subscription (annual, monthly, quarterly)',
                            'Free trial',
                            'Student discount'
                        ]
                    ],
                    [
                        'name' => 'Types of Facilities',
                        'sub_sub_categories' => [
                            'Independent facilities',
                            'Chain facilities'
                        ]
                    ],
                    [
                        'name' => 'Services Offered',
                        'sub_sub_categories' => [
                            'Equipment and machines',
                            'Crossfit',
                            'Street workout',
                            'Coaching',
                            'Group classes',
                            'Virtual classes',
                            'Sports monitoring (personal coach, physiotherapist)'
                        ]
                    ],
                    [
                        'name' => 'Other Offerings and Services',
                        'sub_sub_categories' => [
                            'Free Wi-Fi',
                            'Electrical outlets',
                            'Snacks and beverages',
                            'Lockers (with or without integrated padlocks)',
                            'Showers'
                        ]
                    ],
                    [
                        'name' => 'Target Audience',
                        'sub_sub_categories' => [
                            'Facilities available to everyone',
                            'Ladies-only'
                        ]
                    ],
                    [
                        'name' => 'Hours and Access',
                        'sub_sub_categories' => [
                            'Opening hours',
                            'Parking',
                            'Access for people with reduced mobility',
                            'Open 24/7',
                            'Open 7 days a week',
                            'Website',
                            'Mobile application'
                        ]
                    ],
                    [
                        'name' => 'Additional Information',
                        'sub_sub_categories' => [
                            'Large facility',
                            'Small facility'
                        ]
                    ],
                ],
            ],

            [
                'category' => 'Healthcare',
                'icon' => 'assets/images/icons/health_care.svg',
                'sub_categories' => [
                    [
                        'name' => 'Payment',
                        'sub_sub_categories' => [
                            'Card/cash',
                            'Reimbursement by health insurance',
                            'Contracted/non-contracted'
                        ]
                    ],
                    [
                        'name' => 'Types of Facilities and Services',
                        'sub_sub_categories' => [
                            'Medical centers',
                            'Public hospitals',
                            'Psychiatric hospitals',
                            'Clinics',
                            'Private practices',
                            'Family planning clinics',
                            'Childcare centers',
                            'Mental health services (MHS)'
                        ]
                    ],
                    [
                        'name' => 'Other Services',
                        'sub_sub_categories' => [
                            'Home visits',
                            'Nursing and physiotherapy',
                            'Emergency medical services',
                            'Pharmacies (emergency pharmacies)',
                            'Blood tests',
                            'Vaccinations'
                        ]
                    ],
                    [
                        'name' => 'Opening Hours and Access',
                        'sub_sub_categories' => [
                            'Access for people with reduced mobility',
                            'Parking',
                            'Opening hours',
                            'Accepting new patients'
                        ]
                    ],
                    [
                        'name' => 'Additional Information',
                        'sub_sub_categories' => [
                            'By appointment (or without)',
                            'Mandatory mask wearing',
                            'Online consultations',
                            'Online appointment scheduling'
                        ]
                    ],
                ],
            ],


            [
                'category' => 'Jewelry and Watches',
                'icon' => 'assets/images/icons/jewelry_watches.svg',
                'sub_categories' => [
                    [
                        'name' => 'Price, Offers, and Benefits',
                        'sub_sub_categories' => [
                            'Card/cash',
                            'Price range',
                            'Discounts and promotions',
                            'Student discount'
                        ]
                    ],
                    [
                        'name' => 'Services Offered',
                        'sub_sub_categories' => [
                            'Artisanal creation',
                            'Battery replacement',
                            'Repair',
                            'Maintenance and polishing',
                            'Waterproof testing',
                            'Comprehensive watch servicing',
                            'Engraving',
                            'Piercing',
                            'Jewelry transformation',
                            'Bead threading'
                        ]
                    ],
                    [
                        'name' => 'Other Services',
                        'sub_sub_categories' => [
                            'Watch and jewelry resale and appraisal',
                            'Gold exchange'
                        ]
                    ],
                    [
                        'name' => 'Hours and Access',
                        'sub_sub_categories' => [
                            'Access for people with reduced mobility',
                            'Parking',
                            'Opening hours',
                            'Website/E-shop',
                            'Mobile application'
                        ]
                    ],
                    [
                        'name' => 'Additional Information',
                        'sub_sub_categories' => [
                            'Delivery',
                            'In-store pickup',
                            'Orders and pre-orders',
                            'Mondial Relay',
                            'Appointment scheduling'
                        ]
                    ],
                ],
            ],
            [
                'category' => 'Real Estate',
                'icon' => 'assets/images/icons/real_estate.svg',
                'sub_categories' => [
                    [
                        'name' => 'Price, Offers, and Benefits',
                        'sub_sub_categories' => [
                            'Price range',
                            'Promotions'
                        ]
                    ],
                    [
                        'name' => 'Services Offered',
                        'sub_sub_categories' => [
                            'Personal property information',
                            'Notary',
                            'Real estate sales',
                            'Evaluation',
                            'House clearance',
                            'Assistance (investment, financial arrangement optimization)',
                            'Financing assistance',
                            'Property developers',
                            'Home assessment'
                        ]
                    ],
                ],
            ],

            [
                'category' => 'Automotive',
                'icon' => 'assets/images/icons/automotive.svg',
                'sub_categories' => [
                    [
                        'name' => 'Price, Offers, and Benefits',
                        'sub_sub_categories' => [
                            'Card/cash',
                            'Discounts',
                            'Loyalty program',
                            'Price range'
                        ]
                    ],
                    [
                        'name' => 'Services Offered',
                        'sub_sub_categories' => [
                            'Polishing and buffing',
                            'Ceramic protection and treatment',
                            'Home cleaning service',
                            'Complete vehicle disinfection',
                            'Interior options and reconditioning',
                            'Tire change',
                            '(Pre)technical inspection',
                            'Electronic part repair',
                            'Oil change and pollution control',
                            'Cleaning',
                            'Self carwash with/without contact',
                            'Air conditioning service',
                            'Maintenance and repair',
                            'Vehicle trade-in',
                            'Labor',
                            'Insurance provision'
                        ]
                    ],
                    [
                        'name' => 'Rental and Sales Services',
                        'sub_sub_categories' => [
                            'Car sales',
                            'Equipment and vehicle rental',
                            'Replacement vehicles',
                            'Rental for individuals/professionals',
                            'Company rentals',
                            'Car part sales',
                            'Second-hand rentals',
                            'Vehicle and equipment purchases'
                        ]
                    ],
                    [
                        'name' => 'Brands',
                        'sub_sub_categories' => [
                            'Specialized in a single brand',
                            'Multibrand'
                        ]
                    ],
                    [
                        'name' => 'Vehicle Types',
                        'sub_sub_categories' => [
                            'Manual',
                            'Automatic',
                            'Luxury',
                            'Vans and trucks',
                            'Professional (ambulances, etc.)'
                        ]
                    ],
                    [
                        'name' => 'Hours and Access',
                        'sub_sub_categories' => [
                            'Access for people with reduced mobility',
                            'Parking',
                            'Opening hours',
                            '24/7 assistance',
                            'Website'
                        ]
                    ],
                    [
                        'name' => 'Additional Information',
                        'sub_sub_categories' => [
                            'Appointment scheduling',
                            'Walk-in service',
                            'On-site',
                            'Mobile showroom'
                        ]
                    ],
                ],
            ],
            [
                'category' => 'Animals',
                'icon' => 'assets/images/icons/animals.svg',
                'sub_categories' => [
                    [
                        'name' => 'Pet Care Services',
                        'sub_sub_categories' => [
                            'Groomers',
                            'Veterinary clinics'
                        ]
                    ],
                    [
                        'name' => 'Products for Sale',
                        'sub_sub_categories' => [
                            'Pet food',
                            'Pet houses',
                            'Cat trees',
                            'Mats',
                            'Toys',
                            'Blankets and textiles',
                            'Collars',
                            'Medicines and supplements',
                            'Electronics'
                        ]
                    ],
                    [
                        'name' => 'Shelters and Centers',
                        'sub_sub_categories' => [
                            'Wildlife centers',
                            'Domestic animal shelters'
                        ]
                    ],
                    [
                        'name' => 'Hours and Access',
                        'sub_sub_categories' => [
                            'Parking',
                            'Access for people with reduced mobility',
                            'Opening hours',
                            'Website/E-shop',
                            'Mobile application',
                        ]
                    ],
                    [
                        'name' => 'Price, Offers, and Benefits',
                        'sub_sub_categories' => [
                            'Card/cash',
                            'Gift vouchers/advantage cards',
                            'Loyalty program',
                            'Promotions/low prices',
                            'Subscription',
                            'Pet insurance reimbursement'
                        ]
                    ],
                    [
                        'name' => 'Additional Information',
                        'sub_sub_categories' => [
                            'Delivery',
                            'Purchase and pickup in-store',
                            'Orders and pre-orders',
                            'Relay point'
                        ]
                    ],
                ],
            ],
            [
                'category' => 'Childcare Centers',
                'icon' => 'assets/images/icons/childcare.svg',
                'sub_categories' => [
                    [
                        'name' => 'Payment',
                        'sub_sub_categories' => [
                            'Subsidized',
                            'Non-subsidized',
                            'Food included in fees'
                        ]
                    ],
                    [
                        'name' => 'Services Offered',
                        'sub_sub_categories' => [
                            'Pet sitting',
                            'Multiple caregivers available',
                            'Special care for children (autism, visual impairment, mute, etc.)',
                            'Nap room',
                            'Linguistic offerings'
                        ]
                    ],
                    [
                        'name' => 'Hours and Access',
                        'sub_sub_categories' => [
                            'Opening and closing hours',
                            'Access for people with reduced mobility and strollers',
                            'Possibility of picking up the child earlier',
                            'Childs age group'
                        ]
                    ],
                ],
            ],

            [
                'category' => 'Culture and Leisure',
                'icon' => 'assets/images/icons/culture_lesaure.svg',
                'sub_categories' => [
                    [
                        'name' => 'Price, Offers, and Benefits',
                        'sub_sub_categories' => [
                            'Card/cash',
                            'Gift vouchers/advantage cards',
                            'Loyalty program',
                            'Promotions/low prices',
                            'Student discount',
                            'Subscription',
                            'Free entry'
                        ]
                    ],
                    [
                        'name' => 'Types of Services and Events',
                        'sub_sub_categories' => [
                            'Premieres',
                            '3D/4DX option',
                            'Marathons',
                            'Birthday parties',
                            'Meet and greets with actors',
                            'Shows and performances',
                            'Educational activities',
                            'workshops',
                            'classes',
                            'school activities'
                        ]
                    ],
                    [
                        'name' => 'Other Offers and Services',
                        'sub_sub_categories' => [
                            'Late-night showings',
                            'Food area/picnic area',
                            'Cloakroom',
                            'Guided tours',
                            'Audio guides',
                            'Available languages',
                            'Baby rooms',
                            'School excursions',
                            'Workshop exhibitions for rent'
                        ]
                    ],
                    [
                        'name' => 'Target Audience',
                        'sub_sub_categories' => [
                            'General public',
                            'Informed public',
                            'Groups',
                            'Children'
                        ]
                    ],
                    [
                        'name' => 'Types of Venues',
                        'sub_sub_categories' => [
                            'Independent',
                            'Chain venues',
                            'Updated new releases',
                            'Classic films',
                            'Themed venues'
                        ]
                    ],
                    [
                        'name' => 'Hours and Access',
                        'sub_sub_categories' => [
                            'Access for people with reduced mobility',
                            'Parking',
                            'Opening hours',
                            'Average time for specific activities',
                            'Toilets',
                            'Website',
                            'Mobile application'
                        ]
                    ],
                    [
                        'name' => 'Additional Information',
                        'sub_sub_categories' => [
                            'Air-conditioned venue',
                            'Online/on-site reservations',
                            'Large/small venue'
                        ]
                    ],
                ],
            ],

            [
                'category' => 'Parks and Gardens',
                'icon' => 'assets/images/icons/parks.svg',
                'sub_categories' => [
                    [
                        'name' => 'Price, Offers, and Benefits',
                        'sub_sub_categories' => [
                            'Free admission',
                            'Price ranges',
                            'Student discount',
                            'Discounts'
                        ]
                    ],
                    [
                        'name' => 'Types of Places',
                        'sub_sub_categories' => [
                            'Public gardens',
                            'Greenhouses',
                            'Public parks',
                            'Animal parks'
                        ]
                    ],
                    [
                        'name' => 'Hours and Access',
                        'sub_sub_categories' => [
                            'Access for people with reduced mobility',
                            'Parking',
                            'Opening hours'
                        ]
                    ],
                ],
            ],

            [
                'category' => 'Textile and Shoe Treatment',
                'icon' => 'assets/images/icons/textile.svg',
                'sub_categories' => [
                    [
                        'name' => 'Price, Offers, and Benefits',
                        'sub_sub_categories' => [
                            'Card/cash',
                            'Price range',
                            'Discounts and promotions',
                            'Student discount'
                        ]
                    ],
                    [
                        'name' => 'Services Offered',
                        'sub_sub_categories' => [
                            'Alterations and repairs',
                            'Transformation',
                            'Dry cleaning and pressing',
                            'Ironing',
                            'Automatic laundry',
                            'Ecological laundry',
                            'At-home service',
                            'Cobbler'
                        ]
                    ],
                    [
                        'name' => 'Hours and Access',
                        'sub_sub_categories' => [
                            'Access for people with reduced mobility',
                            'Parking',
                            'Opening hours',
                            'Website/E-shop',
                            'Mobile application'
                        ]
                    ],
                    [
                        'name' => 'Additional Information',
                        'sub_sub_categories' => [
                            'Delivery',
                            'In-store pickup',
                            'Orders and pre-orders',
                            'Mondial Relay',
                            'Appointment scheduling'
                        ]
                    ],
                ],
            ],

            [
                'category' => 'Home and DIY',
                'icon' => 'assets/images/icons/home_diy.svg',
                'sub_categories' => [
                    [
                        'name' => 'Price, Offers, and Benefits',
                        'sub_sub_categories' => [
                            'Card/cash',
                            'Gift cards',
                            'Loyalty program',
                            'With guarantees',
                            'Promotions',
                            'Price range'
                        ]
                    ],
                    [
                        'name' => 'Products for Sale',
                        'sub_sub_categories' => [
                            'Professional materials and tools',
                            'Paints',
                            'Moldings',
                            'Parquet flooring',
                            'PVC coverings',
                            'Second-hand items',
                            'Interior decoration',
                            'Household appliances',
                            'Furniture',
                            'Rugs and carpets'
                        ]
                    ],
                    [
                        'name' => 'Styles',
                        'sub_sub_categories' => [
                            'Industrial',
                            'Vintage',
                            'Natural',
                            'Brands'
                        ]
                    ],
                    [
                        'name' => 'Services Offered',
                        'sub_sub_categories' => [
                            'Wallpaper installation',
                            'Repair and maintenance',
                            'Home installation',
                            'Custom item fabrication',
                            'Renovation',
                            'Spare parts',
                            'Battery service',
                            'Tinting machine',
                            'Wood and glass cutting',
                            'Made-to-measure',
                            'Planning tools',
                            'In-home furnishing advice',
                            'Training offerings',
                            'Personalized advice',
                            'Project studies and quotes'
                        ]
                    ],
                    [
                        'name' => 'Rental and Resale',
                        'sub_sub_categories' => [
                            'Vehicle rental, vans for transport',
                            'Equipment resale'
                        ]
                    ],
                    [
                        'name' => 'Hours and Access',
                        'sub_sub_categories' => [
                            'Access for people with reduced mobility',
                            'Parking',
                            'Opening hours'
                        ]
                    ],
                ],
            ],
        ];

        foreach ($categories as $key => $main_category) {
            $cat = new Category();
            $cat->level = 0;
            $cat->name = $main_category['category'];
            $cat->slug = Str::slug($main_category['category']);
            $cat->icon = $main_category['icon'];
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
