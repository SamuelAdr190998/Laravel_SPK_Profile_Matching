<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AspekPenilaian extends Model
{
    protected $table = 'aspek_penilaian';
    protected $fillable = [
        'kode_aspek_penilaian',
        'nama_aspek_penilaian'
    ];
}
