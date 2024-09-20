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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invitation_id')->constrained();
            $table->foreignId('supplier_id')->constrained();
            $table->foreignId('supplier_id')->constrained();
            $table->enum('status',['pending','accepted','rejected'])->default('pending');
            $table->text('description')->nullable()->default('Sin observaciones');
            $table->json('payload');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
