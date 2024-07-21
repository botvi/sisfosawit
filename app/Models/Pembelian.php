<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $casts = [
        'karyawan_id' => 'array', // Cast karyawan_id sebagai array
    ];

    protected $fillable = ['karyawan_id', 'tanggal', 'jumlah_kilo', 'harga_beli_id', 'total'];

    // Relasi many-to-one dengan HargaBeli
    public function hargaBeli()
    {
        return $this->belongsTo(HargaBeli::class);
    }
    public function karyawans()
    {
        return $this->belongsToMany(Karyawan::class);
    }
}
