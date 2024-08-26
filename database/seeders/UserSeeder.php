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
            'name'=>'sara',
            'email'=>'sara.cuy.ramirez@gmail.com',
            'role_id'=>'1',
            'password'=>Hash::make('hola')
        ]);

        DB::table('users')->insert([
            'name'=>'sara',
            'email'=>'sara.cuya.ramirez@gmail.com',
            'role_id'=>'2',
            'password'=>Hash::make('hola')
        ]);

        DB::table('users')->insert([
            'name'=>'sarita',
            'email'=>'saraa.cuy.ramirez@gmail.com',
            'role_id'=>'3',
            'password'=>Hash::make('hola')
        ]);
    }
}
