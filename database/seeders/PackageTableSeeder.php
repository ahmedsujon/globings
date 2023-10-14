<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\PackageTimePlan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            [
                'package_name' => 'Basic',
                'description' => 'Basic Package',
                'time_plans' => [
                    'Monthly Plan' => [
                        'duration' => 1,
                        'price' => 10,
                        'description' => 'Total 10 USD in 1 month',
                    ],
                    '3 Months Plan' => [
                        'duration' => 3,
                        'price' => 8,
                        'description' => 'Total 24 USD in 3 months',
                    ],
                    '12 Months Plan' => [
                        'duration' => 12,
                        'price' => 5,
                        'description' => 'Total 60 USD in 12 months',
                    ]
                ],

            ],
            [
                'package_name' => 'Premium',
                'description' => 'Premium Package',
                'time_plans' => [
                    'Monthly Plan' => [
                        'duration' => 1,
                        'price' => 20,
                        'description' => 'Total 20 USD in 1 month',
                    ],
                    '3 Months Plan' => [
                        'duration' => 3,
                        'price' => 18,
                        'description' => 'Total 54 USD in 3 months',
                    ],
                    '12 Months Plan' => [
                        'duration' => 12,
                        'price' => 15,
                        'description' => 'Total 180 USD in 12 months',
                    ]
                ],

            ],
            [
                'package_name' => 'Professional',
                'description' => 'Professional Package',
                'time_plans' => [
                    'Monthly Plan' => [
                        'duration' => 1,
                        'price' => 30,
                        'description' => 'Total 30 USD in 1 month',
                    ],
                    '3 Months Plan' => [
                        'duration' => 3,
                        'price' => 27,
                        'description' => 'Total 81 USD in 3 months',
                    ],
                    '12 Months Plan' => [
                        'duration' => 12,
                        'price' => 25,
                        'description' => 'Total 300 USD in 12 months',
                    ]
                ],

            ]
        ];


        foreach ($packages as $package) {
            $pack = new Package();
            $pack->name = $package['package_name'];
            $pack->description = $package['description'];
            $pack->status = 1;
            $pack->save();

            foreach ($package['time_plans'] as $key => $value) {
                $timePlan = new PackageTimePlan();
                $timePlan->package_id = $pack->id;
                $timePlan->name = $key;
                $timePlan->duration = $value['duration'];
                $timePlan->price = $value['price'];
                $timePlan->description = $value['description'];
                $timePlan->save();
            }
        }
    }
}
