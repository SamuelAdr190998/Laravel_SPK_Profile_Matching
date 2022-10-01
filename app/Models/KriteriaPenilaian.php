<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KriteriaPenilaian extends Model
{
    protected $table = 'kriteria_penilaian';
    protected $fillable = [
        'id_aspek_penilaian',
        'kode_kriteria_penilaian',
        'nama_kriteria_penilaian',
        'bobot_kriteria_penilaian'
    ];

    public function aspekpenilaian()
    {
        return $this->hasOne(AspekPenilaian::class, 'id', 'id_aspek_penilaian');
    }
}
