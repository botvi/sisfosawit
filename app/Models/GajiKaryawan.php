<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiKaryawan extends Model
{
    use HasFactory;
    protected $fillable = ['karyawan_id', 'jumlah_gaji'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
