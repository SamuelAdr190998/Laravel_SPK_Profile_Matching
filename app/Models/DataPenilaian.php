<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPenilaian extends Model
{
    protected $table = 'data_penilaian';
    protected $fillable = [
        'id_alternatif',
        'id_kriteria',
        'kode_sub_kriteria_array'
    ];

    public function alternatif()
    {
        return $this->hasOne(DataAlternatif::class, 'id', 'id_alternatif');
    }

    public function kriteria()
    {
        return $this->hasOne(DataKriteria::class, 'id', 'id_kriteria');
    }

    public function searchByKodeSubKriteria($kode_subkriteria)
    {
        return DataSubKriteria::where('kode_sub_kriteria', $kode_subkriteria)->first();
    }
}
