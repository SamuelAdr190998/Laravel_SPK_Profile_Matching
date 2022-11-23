<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataAlternatif extends Model
{
    protected $table = 'data_alternatif';
    protected $fillable = [
        'kode_alternatif',
        'nama_kos',
        'link_kos',
        'pemilik_kos',
        'jenis_kos',
        'alamat_kos',
        'whatsapp_kos'
    ];
}
