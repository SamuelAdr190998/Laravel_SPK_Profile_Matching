<?php

namespace App\Module;

use App\Models\AspekPenilaian;
use App\Models\DataAlternatif;
use App\Models\DataPenilaian;
use App\Models\KriteriaPenilaian;
use App\Models\SubkriteriaPenilaian;

class ProfileMatching
{

    protected $AspekPenilaian;
    protected $DataKriteria;
    protected $DataSubkriteria;
    protected $DataAlternatif;
    protected $DataPenilaian;

    public function __construct()
    {
        $this->AspekPenilaian = AspekPenilaian::all();
        $this->DataKriteria = KriteriaPenilaian::all();
        $this->DataSubkriteria = SubkriteriaPenilaian::all();
        $this->DataAlternatif = DataAlternatif::all();
        $this->DataPenilaian = DataPenilaian::all();
    }

    public function Result()
    {
        // dd('Ini hasil remote Ferdy');
        dd('Testing Kedua');
        $this->MenghitungNilaiGAP();
    }

    // Step 1 : Menentukan Aspek Penilaian dan Nilai Bobot Standar Kompetensi
    // Step 2 : Menghitung GAP
    public function MenghitungNilaiGAP()
    {
        $manipulasiDataGAP = [];
        foreach ($this->DataPenilaian as $key => $value) {
            $manipulasiDataGAP[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif][$value->kriteriapenilaian->kode_kriteria_penilaian] = $value->subkriteriapenilaian->bobot_subkriteria_penilaian - $value->kriteriapenilaian->bobot_kriteria_penilaian;
        }

        dd($manipulasiDataGAP);
    }

    // Step 3 : Pemetaaan GAP
    // Step 4 : Pengelompokkan Core Factor (CF) dan Secondary Factor (SF)
    // Step 5 : Perhitungan Nilai Total (NT) dan Perangkingan
}
