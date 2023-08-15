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
            'position_uid'=>'staff'
        ]);
        User::create([
            'uid'=>'987654321',
            'name'=>'Technician',
            'email'=>'technician@developer.com',
            'password'=>'developer',
            'position_uid'=>'staff'
        ]);

    }
}
