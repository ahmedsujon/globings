<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $getUser = User::where('email', 'user@example.com')->first();

        if (!$getUser) {
            $user = new User();
            $user->first_name = 'Globings';
            $user->last_name = 'user';
            $user->email = 'user@example.com';
            $user->phone = '01700000000';
            $user->password = Hash::make('12345678');
            $user->avatar = 'assets/images/avatar.png';
            $user->account_type = 'private';
            $user->save();
        }
    }
}
