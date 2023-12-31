<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Division::create([
            'uid' => 'it',
            'name'=> 'IT'
        ]);
        
        Division::create([
            'uid' => 'sales',
            'name'=> 'Sales'
        ]);

        Division::create([
            'uid' => 'logistics',
            'name'=> 'Logistics'
        ]);

        Division::create([
            'uid' => 'finance',
            'name'=> 'FInance'
        ]);

        Division::create([
            'uid' => 'warehouse',
            'name'=> 'Warehouse'
        ]);
        Division::create([
            'uid' => 'technician',
            'name'=> 'Technician'
        ]);

        Division::create([
            'uid' => 'scm',
            'name'=> 'Scm'
        ]);

        Division::create([
            'uid' => 'admin',
            'name'=> 'admin'
        ]);
        
        Division::create([
            'uid' => 'superadmin',
            'name'=> 'Superadmin'
        ]);

    }
}
