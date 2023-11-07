<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Event;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Event::factory(10)->create();
        $this->call(AdminPermissionTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PackageTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(ShopTableSeeder::class);
    }
}
