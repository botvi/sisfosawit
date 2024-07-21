<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    use HasFactory;
    protected $fillable = ['karyawan_id', 'jumlah', 'bulan', 'status'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
