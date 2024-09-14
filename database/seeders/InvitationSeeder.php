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
            'name'=>'CONSULTORÍA Y ACOMPAÑAMIENTO TÉCNICO EN EL COMPONENTE DE DESARROLLO FINANCIERO PARA UNIDADES PRODUCTIVAS DEL PROGRAMA FORTALESER',
            'date_start'=>'2024-08-22',
            'date_finish'=>'2024-08-22',
            'active'=>'1',
            'quantity'=>1000256,
            'description'=>'Se requiere la contratación de una persona natural o jurídica, que preste los servicios de consultoría para el desarrollo del programa FortaleSER 2024, quien realizará acompañamiento técnico financiero a las unidades productivas durante el desarrollo de dicho programa en el marco del convenio de cooperación No. 023- 2024 celebrado entre la fiduciaria colombiana de comercio exterior S.A. – Fiducoldex, como vocera y administradora del patrimonio autónomo de iNNpulsa Colombia y la Cámara de Comercio de Ibagué.
Poner a disposición por lo menos 3.290 horas de acompañamiento técnico financiero in situ enfocado en el desarrollo de las capacidades financieras del propietario (o su delegado), a las Unidades Productivas participantes (UP), distribuidas entre todas las UP activas y vinculadas al programa (aplicando como mínimo 7 horas a cada UP intervenida), siguiendo los lineamientos de la transferencia de la metodología realizada por iNNpulsa Colombia.',
            'files'=>json_encode([])
        ]);
        DB::table('invitations')->insert([
            'name'=>'PERSONA NATURAL O JURIDICA CONSULTORIA Y ACOMPAÑAMIENTO PARA EL DESARROLLO DE LABORATORIOS PRACTICOS EN UNIDADES PRODUCTIVAS DE ECONOMIA POPULAR',
            'date_start'=>'2024-08-22',
            'date_finish'=>'2024-08-22',
            'active'=>'1',
            'quantity'=>1000256,
            'description'=>'Se requiere la contratación de persona natural o jurídica que preste los servicios de consultoría para el desarrollo del programa FortaleSER 2024, quien realizará acompañamiento en espacios de laboratorios teórico prácticos con interacción entre las unidades productivas, durante la ejecución de dicho programa en el marco del convenio de cooperación No. 023- 2024 celebrado entre la fiduciaria colombiana de comercio exterior S.A. – Fiducoldex, como vocera y administradora del patrimonio autónomo de INNpulsa
             Colombia y la Cámara de Comercio de Ibagué.',
            'files'=>json_encode([])
        ]);
        DB::table('invitations')->insert([
            'name'=>'PERSONA NATURAL O JURIDICA CONSULTORIA Y ACOMPAÑAMIENTO PARA EL DESARROLLO DE LABORATORIOS PRACTICOS EN UNIDADES PRODUCTIVAS DE ECONOMIA POPULAR',
            'date_start'=>'2024-08-22',
            'date_finish'=>'2024-08-22',
            'active'=>'1',
            'quantity'=>1000256,
            'description'=>'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
            'files'=>json_encode([])
        ]);
    }
}
