<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->enum('id_type',['cedula','rut','nit']);
            $table->string('identification_number');
            $table->enum('person_type',['natural','juridica']);
            $table->string('company_name');
            $table->string('comercial_name');
            $table->string('email');
            $table->string('web_page');
            $table->string('regimen');
            $table->string('retainer');
            $table->string('contributor');
            $table->string('ica');
            $table->string('phone');
            $table->string('ciuu');
            $table->string('rut');
            $table->string('iso_9001');
            $table->string('copy_doc_represent');
            $table->string('bank_certification');

//            $table->unsignedBigInteger('created_by');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
