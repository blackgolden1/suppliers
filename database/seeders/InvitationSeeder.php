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
            'name'=>'Lorem Ipsum',
            'date_start'=>'2024-08-22',
            'date_finish'=>'2024-08-22',
            'active'=>'1',
            'quantity'=>1000256,
            'description'=>'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
            'files'=>[['file_name' => 'documento.pdf',
                'file_path' => 'public/convocatorias/Lorem_Ipsum.pdf']]
        ]);
        DB::table('invitations')->insert([
            'name'=>'Lorem Ipsum2',
            'date_start'=>'2024-08-22',
            'date_finish'=>'2024-08-22',
            'active'=>'1',
            'quantity'=>1000256,
            'description'=>'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
            'files'=>[['file_name' => 'documento.pdf',
                'file_path' => 'public/convocatorias/Lorem_Ipsum.pdf']]
        ]);
        DB::table('invitations')->insert([
            'name'=>'Lorem Ipsum3',
            'date_start'=>'2024-08-22',
            'date_finish'=>'2024-08-22',
            'active'=>'1',
            'quantity'=>1000256,
            'description'=>'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
            'files'=>[['file_name' => 'documento.pdf',
                'file_path' => 'public/convocatorias/Lorem_Ipsum.pdf']]
        ]);
    }
}
