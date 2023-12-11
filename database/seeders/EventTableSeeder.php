<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 10; $i++) {
            $faker = Faker::create();

            $event = new Event();

            $event->user_id = $faker->numberBetween(1, 5);
            $event->name = $faker->name;
            $event->date = $faker->date();
            $event->location = $faker->address;
            $event->description = $faker->text(500);
            $event->description = $faker->text(500);
            $event->banner = 'assets/images/placeholder-rect.jpg';
            $event->extension = 'jpg';
            $event->save();
        }


    }
}
