<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'uid'=>'123456789',
            'name'=>'Developer',
            'email'=>'dev@developer.com',
            'password'=>'developer',
            'position_uid'=>'staff',
            'division_uid'=>'it'
        ]);


        User::create([
            'uid'=>'987654321',
            'name'=>'Sales',
            'email'=>'sales@developer.com',
            'password'=>'developer',
            'position_uid'=>'coordinator',
            'division_uid'=>'sales',
        ]);

        User::create([
            'uid'=>'121212121',
            'name'=>'Warehouse',
            'email'=>'warehouse@developer.com',
            'password'=>'developer',
            'position_uid'=>'coordinator',
            'division_uid'=>'warehouse',
        ]);

        User::create([
            'uid'=>'1313131313',
            'name'=>'Logistics',
            'email'=>'logistics@developer.com',
            'password'=>'developer',
            'position_uid'=>'coordinator',
            'division_uid'=>'logistics',
        ]);

        User::create([
            'uid'=>'1414141414',
            'name'=>'Finance',
            'email'=>'finance@developer.com',
            'password'=>'developer',
            'position_uid'=>'coordinator',
            'division_uid'=>'finance',
        ]);

        User::create([
            'uid'=>'1515151515',
            'name'=>'Technician',
            'email'=>'technician@developer.com',
            'password'=>'developer',
            'position_uid'=>'coordinator',
            'division_uid'=>'technician',
        ]);

        User::create([
            'uid'=>'1616161616',
            'name'=>'Qc',
            'email'=>'qc@developer.com',
            'password'=>'developer',
            'position_uid'=>'coordinator',
            'division_uid'=>'qc',
        ]);

        User::create([
            'uid'=>'1717171717',
            'name'=>'Marketing',
            'email'=>'marketing@developer.com',
            'password'=>'developer',
            'position_uid'=>'coordinator',
            'division_uid'=>'marketing',
        ]);

    }
}
