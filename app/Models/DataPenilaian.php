<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPenilaian extends Model
{
    protected $table = 'data_penilaian';
    protected $fillable = [
        'id_alternatif',
        'id_aspek_penilaian',
        'id_kriteria_penilaian',
        'id_subkriteria_penilaian'
    ];

    public function alternatif()
    {
        return $this->hasOne(DataAlternatif::class, 'id', 'id_alternatif');
    }

    public function aspekpenilaian()
    {
        return $this->hasOne(AspekPenilaian::class, 'id', 'id_aspek_penilaian');
    }

    public function kriteriapenilaian()
    {
        return $this->hasOne(KriteriaPenilaian::class, 'id', 'id_kriteria_penilaian');
    }

    public function subkriteriapenilaian()
    {
        return $this->hasOne(SubkriteriaPenilaian::class, 'id', 'id_subkriteria_penilaian');
    }
}
