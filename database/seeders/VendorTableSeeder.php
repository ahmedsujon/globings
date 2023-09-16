<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $getVendor = Vendor::where('email', 'vendor@example.com')->first();

        if (!$getVendor) {
            $vendor = new Vendor();
            $vendor->name = 'Globings Vendor';
            $vendor->email = 'vendor@example.com';
            $vendor->phone = '01700000000';
            $vendor->password = Hash::make('12345678');
            $vendor->avatar = 'assets/images/avatar.png';
            $vendor->save();
        }
    }
}
