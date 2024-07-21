<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'jabatan', 'alamat', 'telepon'];

    // Relasi many-to-many dengan Pembelian
    public function pembelians()
    {
        return $this->belongsToMany(Pembelian::class, 'karyawan_pembelian');
    }

    // Relasi one-to-many dengan Penjualan
    public function penjualans()
    {
        return $this->hasMany(Penjualan::class);
    }
}
