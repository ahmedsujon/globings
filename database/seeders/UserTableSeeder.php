<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userOne = User::where('email', 'globings@gmail.com')->first();
        $userTwo = User::where('email', 'globingshop@gmail.com')->first();
        $userThree = User::where('email', 'shop@example.com')->first();
        $userFour = User::where('email', 'user@example.com')->first();
        $userFive = User::where('email', 'userfive@example.com')->first();
        $userSix = User::where('email', 'usersix@example.com')->first();
        $userSeven = User::where('email', 'userseven@example.com')->first();
        $userEight = User::where('email', 'usereight@example.com')->first();
        $userNine = User::where('email', 'usernine@example.com')->first();
        $userTen = User::where('email', 'userten@example.com')->first();

        if (!$userOne) {
            $user = new User();
            $user->first_name = 'Globings';
            $user->last_name = 'User';
            $user->username = 'globings';
            $user->email = 'globings@gmail.com';
            $user->phone = '01700000000';
            $user->password = Hash::make('12345678');
            $user->avatar = 'assets/images/avatar.png';
            $user->account_type = 'private';
            $user->referral_code = 'GL-' . Str::upper(Str::random(7)) . '1';
            $user->save();
        }
        if (!$userTwo) {
            $user = new User();
            $user->first_name = 'Globings';
            $user->last_name = 'Shop';
            $user->username = 'globingsshop';
            $user->email = 'globingshop@gmail.com';
            $user->phone = '01700000000';
            $user->password = Hash::make('12345678');
            $user->avatar = 'assets/images/avatar.png';
            $user->account_type = 'Professional';
            $user->referral_code = 'GL-' . Str::upper(Str::random(7)) . '1';
            $user->save();
        }
        if (!$userThree) {
            $user = new User();
            $user->first_name = 'Test';
            $user->last_name = 'Shop';
            $user->username = 'shop';
            $user->email = 'shop@example.com';
            $user->phone = '01700000000';
            $user->password = Hash::make('12345678');
            $user->avatar = 'assets/images/avatar.png';
            $user->account_type = 'Professional';
            $user->referral_code = 'GL-' . Str::upper(Str::random(7)) . '1';
            $user->save();
        }
        if (!$userFour) {
            $user = new User();
            $user->first_name = 'Test';
            $user->last_name = 'User';
            $user->username = 'user';
            $user->email = 'user@example.com';
            $user->phone = '01700000000';
            $user->password = Hash::make('12345678');
            $user->avatar = 'assets/images/avatar.png';
            $user->account_type = 'private';
            $user->referral_code = 'GL-' . Str::upper(Str::random(7)) . '1';
            $user->save();
        }
        if (!$userFive) {
            $user = new User();
            $user->first_name = 'User';
            $user->last_name = 'Five';
            $user->username = 'user5';
            $user->email = 'user5@example.com';
            $user->phone = '01700000000';
            $user->password = Hash::make('12345678');
            $user->avatar = 'assets/images/avatar.png';
            $user->account_type = 'private';
            $user->referral_code = 'GL-' . Str::upper(Str::random(7)) . '1';
            $user->save();
        }
        if (!$userSix) {
            $user = new User();
            $user->first_name = 'User';
            $user->last_name = 'Six';
            $user->username = 'user6';
            $user->email = 'user6@example.com';
            $user->phone = '01700000000';
            $user->password = Hash::make('12345678');
            $user->avatar = 'assets/images/avatar.png';
            $user->account_type = 'private';
            $user->referral_code = 'GL-' . Str::upper(Str::random(7)) . '1';
            $user->save();
        }
        if (!$userSeven) {
            $user = new User();
            $user->first_name = 'User';
            $user->last_name = 'Seven';
            $user->username = 'user7';
            $user->email = 'user7@example.com';
            $user->phone = '01700000000';
            $user->password = Hash::make('12345678');
            $user->avatar = 'assets/images/avatar.png';
            $user->account_type = 'private';
            $user->referral_code = 'GL-' . Str::upper(Str::random(7)) . '1';
            $user->save();
        }
        if (!$userEight) {
            $user = new User();
            $user->first_name = 'User';
            $user->last_name = 'Eight';
            $user->username = 'user8';
            $user->email = 'user8@example.com';
            $user->phone = '01700000000';
            $user->password = Hash::make('12345678');
            $user->avatar = 'assets/images/avatar.png';
            $user->account_type = 'private';
            $user->referral_code = 'GL-' . Str::upper(Str::random(7)) . '1';
            $user->save();
        }
        if (!$userNine) {
            $user = new User();
            $user->first_name = 'User';
            $user->last_name = 'Nine';
            $user->username = 'user9';
            $user->email = 'user9@example.com';
            $user->phone = '01700000000';
            $user->password = Hash::make('12345678');
            $user->avatar = 'assets/images/avatar.png';
            $user->account_type = 'private';
            $user->referral_code = 'GL-' . Str::upper(Str::random(7)) . '1';
            $user->save();
        }
        if (!$userTen) {
            $user = new User();
            $user->first_name = 'User';
            $user->last_name = 'Ten';
            $user->username = 'user10';
            $user->email = 'user10@example.com';
            $user->phone = '01700000000';
            $user->password = Hash::make('12345678');
            $user->avatar = 'assets/images/avatar.png';
            $user->account_type = 'private';
            $user->referral_code = 'GL-' . Str::upper(Str::random(7)) . '1';
            $user->save();
        }
    }
}
