<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Permission::create([
            'name'=>'developer',
            'description'=>'Access to all pages'
        ]);

        Permission::create([
            'name'=>'sales',
            'description'=>'Access to all pages'
        ]);

        Permission::create([
            'name'=>'warehouse',
            'description'=>'Access to all pages'
        ]);

        Permission::create([
            'name'=>'logistics',
            'description'=>'Access to all pages'
        ]);

        Permission::create([
            'name'=>'finance',
            'description'=>'Access to all pages'
        ]);

        Permission::create([
            'name'=>'technician',
            'description'=>'Access to minimal pages'
        ]);

        Permission::create([
            'name'=>'scm',
            'description'=>'Access to minimal pages'
        ]);
    }
}









