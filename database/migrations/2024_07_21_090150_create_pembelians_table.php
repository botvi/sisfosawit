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
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->json('karyawan_id'); // Array karyawan yang terlibat dalam pembelian
            $table->date('tanggal'); // Tanggal pembelian
            $table->integer('jumlah_kilo'); // Jumlah kilogram sawit yang dibeli
            $table->foreignId('harga_beli_id'); // Menghubungkan ke tabel harga_belis
            $table->bigInteger('total'); // Total harga pembelian (jumlah_kilo x harga_beli dari tabel harga_belis)
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelians');
    }
};
