<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('requirements')->insert([
            'invitation_id'=>1,
            'type'=>'archivo',
            'description'=>'hoja de vida',
        ]);
        DB::table('requirements')->insert([
            'invitation_id'=>2,
            'type'=>'archivo',
            'description'=>'imagenes',
        ]);
        DB::table('requirements')->insert([
            'invitation_id'=>3,
            'type'=>'archivo',
            'description'=>'rut',
        ]);
    }
}
