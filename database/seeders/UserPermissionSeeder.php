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
            'permission_id' => 2
        ]);
        UserPermission::create([
            'user_uid' => 456654456,
            'permission_id' => 2
        ]);
        UserPermission::create([
            'user_uid' => 123321123,
            'permission_id' => 2
        ]);

        UserPermission::create([
            'user_uid' => 121212121,
            'permission_id' => 3
        ]);
        
        UserPermission::create([
            'user_uid' => 9191919191,
            'permission_id' => 3
        ]);
        
        UserPermission::create([
            'user_uid' => 9876543212,
            'permission_id' => 3
        ]);

        UserPermission::create([
            'user_uid' => 1313131313,
            'permission_id' => 4
        ]);

        UserPermission::create([
            'user_uid' => 1414141414,
            'permission_id' => 5
        ]);

        UserPermission::create([
            'user_uid' => 1515151515,
            'permission_id' => 6
        ]);
        
        UserPermission::create([
            'user_uid' => 1818181818,
            'permission_id' => 6
        ]);

        UserPermission::create([
            'user_uid' => 1616161616,
            'permission_id' => 6
        ]);

        UserPermission::create([
            'user_uid' => 1717171717,
            'permission_id' => 2
        ]);
        UserPermission::create([
            'user_uid' => 7575757575,
            'permission_id' => 7
        ]);

        UserPermission::create([
            'user_uid' => 7575757575,
            'permission_id' => 2
        ]);

        UserPermission::create([
            'user_uid' => 1919191919,
            'permission_id' => 2
        ]);
    }
}
