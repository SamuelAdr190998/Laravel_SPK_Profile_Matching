<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataAlternatifUser extends Model
{
    protected $table = 'data_alternatif_user';
    protected $fillable = [
        'kode_alternatif',
        'nama_alternatif'
    ];
}
