<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaBeli extends Model
{
    use HasFactory;

    protected $fillable = ['harga', 'tanggal_berlaku'];
}
