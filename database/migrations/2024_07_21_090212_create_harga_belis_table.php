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
        Schema::create('harga_belis', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->integer('harga'); // Harga beli per kilogram
            $table->date('tanggal_berlaku'); // Tanggal mulai berlaku harga beli
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harga_belis');
    }
};
