<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('invitations')->insert([
            'name'=>'hola',
            'date_start'=>'2024-08-22',
            'date_finish'=>'2024-08-22',
            'active'=>'1',
            'description'=>'hola',
            'files'=>[['file_name' => 'documento.pdf',
                'file_path' => '/uploads/documento.pdf']]
        ]);
    }
}
