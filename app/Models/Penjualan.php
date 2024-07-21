<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = ['karyawan_id', 'tanggal', 'jumlah_kilo', 'harga_jual_id', 'total'];

    // Relasi many-to-one dengan Karyawan
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    // Relasi many-to-one dengan HargaJual
    public function hargaJual()
    {
        return $this->belongsTo(HargaJual::class);
    }
}
