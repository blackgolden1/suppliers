<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'name'=>'proveedor',
        ]);
        DB::table('roles')->insert([
            'name'=>'director',
        ]);
        DB::table('roles')->insert([
            'name'=>'presidente',
        ]);
        DB::table('roles')->insert([
            'name'=>'junta',
        ]);
        DB::table('roles')->insert([
            'name'=>'admin',
        ]);
    }
}
