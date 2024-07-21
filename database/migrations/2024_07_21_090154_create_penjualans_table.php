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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('karyawan_id'); // Foreign key yang menghubungkan ke tabel karyawans
            $table->date('tanggal'); // Tanggal penjualan
            $table->integer('jumlah_kilo'); // Jumlah kilogram sawit yang dijual
            $table->foreignId('harga_jual_id'); // Menghubungkan ke tabel harga_juals
            $table->bigInteger('total'); // Total harga penjualan (jumlah_kilo x harga_jual dari tabel harga_juals)
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
