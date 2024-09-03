<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            'name'=>'hola',
            'ciuu'=>'hola',
            'phone'=>'hola',
            'email'=>'hola@gmail.com',
            'created_by'=>'1',
            'modified_by'=>'1',
            'address'=>'torre',
            'user_id'=>'1'
        ]);
    }
}
