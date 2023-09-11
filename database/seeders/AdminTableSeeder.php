<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $getAdmin = Admin::where('email', 'admin@example.com')->first();

        if (!$getAdmin) {
            $admin = new Admin();
            $admin->name = 'Globings Admin';
            $admin->email = 'admin@example.com';
            $admin->phone = '01700000000';
            $admin->password = Hash::make('12345678');
            $admin->avatar = 'assets/images/avatar.png';
            $admin->save();
        }
    }
}
