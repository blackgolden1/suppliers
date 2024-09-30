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
            $table->enum('id_type',['rut','nit']);
            $table->string('identification_number');
            $table->enum('person_type',['natural','juridica'])->nullable();
            $table->string('company_name')->nullable();
            $table->string('comercial_name')->nullable();
            $table->string('email')->nullable();
            $table->string('web_page')->nullable();
            $table->string('regimen')->nullable();
            $table->string('retainer')->nullable();
            $table->string('contributor')->nullable();
            $table->string('ica')->nullable();
            $table->string('phone')->nullable();
            $table->string('ciuu')->nullable();
            $table->string('rut')->nullable();
            $table->string('iso_9001')->nullable();
            $table->string('copy_doc_represent')->nullable();
            $table->string('bank_certification')->nullable();
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
