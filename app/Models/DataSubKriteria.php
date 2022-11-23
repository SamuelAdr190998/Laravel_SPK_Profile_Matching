<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSubKriteria extends Model
{
    protected $table = 'data_sub_kriteria';
    protected $fillable = [
        'id_kriteria',
        'kode_sub_kriteria',
        'nama_sub_kriteria'
    ];

    public function kriteria()
    {
        return $this->hasOne(DataKriteria::class, 'id', 'id_kriteria');
    }
}
