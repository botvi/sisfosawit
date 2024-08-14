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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('kd_identitas'); // Nama karyawan
            $table->integer('nik'); // Nama karyawan
            $table->string('nama'); // Nama karyawan
            $table->integer('umur'); // Nama karyawan
            $table->string('jabatan'); // Jabatan karyawan
            $table->string('alamat'); // Alamat karyawan
            $table->string('telepon'); // Nomor telepon karyawan
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
