<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubkriteriaPenilaian extends Model
{
    protected $table = 'subkriteria_penilaian';
    protected $fillable = [
        'id_kriteria_penilaian',
        'kode_subkriteria_penilaian',
        'nama_subkriteria_penilaian',
        'bobot_subkriteria_penilaian'
    ];

    public function kriteriapenilaian()
    {
        return $this->hasOne(KriteriaPenilaian::class, 'id', 'id_kriteria_penilaian');
    }
}
