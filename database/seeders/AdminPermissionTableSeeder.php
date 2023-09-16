<?php

namespace Database\Seeders;

use App\Models\AdminPermission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = ["see_dashboard_data", "users_manage", "admins_manage", "settings_manage", "profile_update"];

        foreach ($permissions as $key => $permission) {
            $getData = AdminPermission::where('value', $permission)->first();

            if (!$getData) {
                $data = new AdminPermission();
                $data->name = ucwords(str_replace('_', ' ', $permission));
                $data->value = $permission;
                $data->save();
            }
        }
    }
}
