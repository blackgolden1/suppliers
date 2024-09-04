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
            'id_type'=>'cedula',
            'identification_number'=>'1111111',
            'person_type'=>'natural',
            'company_name'=>'natural',
            'comercial_name'=>'natural',
            'email'=>'hola@gmail.com',
            'web_page'=>'hola@gmail.com',
            'regimen'=>'hola@gmail.com',
            'retainer'=>'hola@gmail.com',
            'contributor'=>'hola@gmail.com',
            'ica'=>'hola@gmail.com',
            'phone'=>'hola',
            'ciuu'=>'hola',
//            'created_by'=>'1',
            'user_id'=>'1',
            'rut'=>'/nose',
            'iso_9001'=>'/nose',
            'copy_doc_represent'=>'/nose',
            'bank_certification'=>'/nose',

        ]);
    }
}
