<?php

namespace Database\Seeders;

use App\Models\Shop;
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
            $user->last_name = 'User';
            $user->username = 'test_user';
            $user->email = 'user@example.com';
            $user->phone = '01700000000';
            $user->password = Hash::make('12345678');
            $user->avatar = 'assets/images/avatar.png';
            $user->account_type = 'private';
            $user->save();
        }

        $getShopUser = User::where('email', 'shop@example.com')->first();
        if (!$getShopUser) {
            $shopUser = new User();
            $shopUser->first_name = 'Test Shop';
            $shopUser->last_name = 'user';
            $shopUser->username = 'test_shop_user';
            $shopUser->email = 'shop@example.com';
            $shopUser->phone = '01700000000';
            $shopUser->password = Hash::make('12345678');
            $shopUser->avatar = 'assets/images/avatar.png';
            $shopUser->account_type = 'professional';
            $shopUser->save();

            $shop = new Shop();
            $shop->user_id = $shopUser->id;
            $shop->name = 'Test Shop';
            $shop->description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit';
            $shop->profile_image = 'assets/images/avatar.png';
            $shop->cover_photo = 'assets/images/placeholder-rect.jpg';
            $shop->latitude = '23.751597323202727';
            $shop->longitude = '90.40795872491326';
            $shop->address = '452/1, Greenway Road, Peyarabag, Mogbazar, Dhaka, Bangladesh';
            $shop->save();

        }
    }
}
