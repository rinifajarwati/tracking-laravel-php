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
            'name'=>'Dzikri Akbar',
            'email'=>'dev@developer.com',
            'password'=>'developer',
            'position_uid'=>'staff',
            'division_uid'=>'it'
        ]);


        User::create([
            'uid'=>'987654321',
            'name'=>'Ana Distia Diva',
            'email'=>'sales@developer.com',
            'password'=>'developer',
            'position_uid'=>'admin',
            'division_uid'=>'sales',
        ]);
        User::create([
            'uid'=>'456654456',
            'name'=>'Hestu Anggrah Eny',
            'email'=>'sales_staff@developer.com',
            'password'=>'developer',
            'position_uid'=>'staff',
            'division_uid'=>'sales',
        ]);
        User::create([
            'uid'=>'123321123',
            'name'=>'Rahayu',
            'email'=>'sales_coor@developer.com',
            'password'=>'developer',
            'position_uid'=>'coordinator',
            'division_uid'=>'sales',
        ]);

        User::create([
            'uid'=>'121212121',
            'name'=>'Yusril Iza',
            'email'=>'warehouse@developer.com',
            'password'=>'developer',
            'position_uid'=>'staff',
            'division_uid'=>'warehouse',
        ]);

        User::create([
            'uid'=>'92929292',
            'name'=>'fajar',
            'email'=>'warehouse_coor@developer.com',
            'password'=>'developer',
            'position_uid'=>'coordinator',
            'division_uid'=>'warehouse',
        ]);

        User::create([
            'uid'=>'9191919191',
            'name'=>'Girindra',
            'email'=>'warehouse_staff@developer.com',
            'password'=>'developer',
            'position_uid'=>'staff',
            'division_uid'=>'warehouse',
        ]);

        User::create([
            'uid'=>'9876543212',
            'name'=>'Raihan',
            'email'=>'warehouse_ppic@developer.com',
            'password'=>'developer',
            'position_uid'=>'admin',
            'division_uid'=>'warehouse',
        ]);
        User::create([
            'uid'=>'6433466464',
            'name'=>'Mita',
            'email'=>'logistics_coor@developer.com',
            'password'=>'developer',
            'position_uid'=>'coordinator',
            'division_uid'=>'logistics',
        ]);

        User::create([
            'uid'=>'1313131313',
            'name'=>'Martania Melani',
            'email'=>'logistics_staff@developer.com',
            'password'=>'developer',
            'position_uid'=>'staff',
            'division_uid'=>'logistics',
        ]);

        User::create([
            'uid'=>'4343434343',
            'name'=>'Melly Nia',
            'email'=>'logistics_admin@developer.com',
            'password'=>'developer',
            'position_uid'=>'admin',
            'division_uid'=>'logistics',
        ]);

     
        
        User::create([
            'uid'=>'6363636363',
            'name'=>'Nurul',
            'email'=>'logistics_qc@developer.com',
            'password'=>'developer',
            'position_uid'=>'qc',
            'division_uid'=>'logistics',
        ]);

        User::create([
            'uid'=>'1414141414',
            'name'=>'Novia Rahayu',
            'email'=>'finance@developer.com',
            'password'=>'developer',
            'position_uid'=>'coordinator',
            'division_uid'=>'finance',
        ]);

        User::create([
            'uid'=>'1515151515',
            'name'=>'Nur Muhammad Diponegoro',
            'email'=>'technician@developer.com',
            'password'=>'developer',
            'position_uid'=>'coordinator',
            'division_uid'=>'technician',
        ]);

        User::create([
            'uid'=>'1616161616',
            'name'=>'Rahma Annisa',
            'email'=>'technician_qc@developer.com',
            'password'=>'developer',
            'position_uid'=>'qc',
            'division_uid'=>'technician',
        ]);

        User::create([
            'uid'=>'1818181818',
            'name'=>'Nadya',
            'email'=>'technician_admin@developer.com',
            'password'=>'developer',
            'position_uid'=>'admin',
            'division_uid'=>'technician',
        ]);
        
        User::create([
            'uid'=>'5858585858',
            'name'=>'Meilia',
            'email'=>'technician_staff@developer.com',
            'password'=>'developer',
            'position_uid'=>'staff',
            'division_uid'=>'technician',
        ]);

        User::create([
            'uid'=>'1717171717',
            'name'=>'Riyantika Aulia',
            'email'=>'sales_marketing@developer.com',
            'password'=>'developer',
            'position_uid'=>'staff',
            'division_uid'=>'sales',
        ]);

        User::create([
            'uid'=>'7575757575',
            'name'=>'Yuli',
            'email'=>'scm@developer.com',
            'password'=>'developer',
            'position_uid'=>'coordinator',
            'division_uid'=>'scm',
        ]);

        User::create([
            'uid'=>'1919191919',
            'name'=>'adminsales',
            'email'=>'adminsales@developer.com',
            'password'=>'developer',
            'position_uid'=>'admin',
            'division_uid'=>'sales',
        ]);
        User::create([
            'uid'=>'2020202020',
            'name'=>'Superadmin',
            'email'=>'superadmin@developer.com',
            'password'=>'developer',
            'position_uid'=>'coordinator',
            'division_uid'=>'superadmin',
        ]);

    }
}
