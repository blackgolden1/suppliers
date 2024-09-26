<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'proveedor',
            'email'=>'sara.cuy.ramirez@gmail.com',
            'type_id'=>'cedula',
            'identification_number'=>'numerodecula',
            'role_id'=>'1',
            'password'=>Hash::make('hola')
        ]);

        DB::table('users')->insert([
            'name'=>'camara',
            'email'=>'sara.cuya.ramirez@gmail.com',
            'type_id'=>'cedula',
            'identification_number'=>'numerodeculaa',
            'role_id'=>'2',
            'password'=>Hash::make('hola')
        ]);

    }
}
