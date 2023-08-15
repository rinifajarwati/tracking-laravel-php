<?php

namespace Database\Seeders;

use App\Models\UserPermission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        UserPermission::create([
            'user_uid' => 123456789,
            'permission_id' => 1
        ]);

        UserPermission::create([
            'user_uid' => 987654321,
            'permission_id' => 6
        ]);
    }
}
