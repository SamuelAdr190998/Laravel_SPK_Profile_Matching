<?php

namespace App\Modules;

use App\Models\DataAlternatif;
use App\Models\DataKriteria;
use App\Models\DataPenilaian;
use App\Models\DataSubKriteria;

class SPKMautAlgorithms
{
    protected $DataAlternatif;
    protected $DataKriteria;
    protected $DataSubKriteria;
    protected $DataPenilaian;
    public function __construct()
    {
        $this->DataAlternatif = DataAlternatif::all();
        $this->DataKriteria = DataKriteria::all();
        $this->DataSubKriteria = DataSubKriteria::all();
        $this->DataPenilaian = DataPenilaian::all();
    }

    public function GenerateDataPenilaian()
    {
        return $this->HasilPreferensi();
    }

    public function NormalisasiDataKriteria()
    {
        $GetDataKriteria = $this->DataKriteria;
        $TotalArrKriteria = 0;
        foreach ($GetDataKriteria as $key => $value) {
            $TotalArrKriteria += $value->bobot_kriteria;
        }

        $RealTotalArrKriteria = [];
        if ($TotalArrKriteria != 1) {
            foreach ($GetDataKriteria as $key => $value) {
                $RealTotalArrKriteria[$value->kode_kriteria] = round($value->bobot_kriteria / $TotalArrKriteria, 3);
            }
        } else {
            foreach ($GetDataKriteria as $key => $value) {
                $RealTotalArrKriteria[$value->kode_kriteria] = round($value->bobot_kriteria, 3);
            }
        }

        return $RealTotalArrKriteria;
    }

    public function NormalisasiDataSubKriteria()
    {
        $GetDataPenilaian = $this->DataPenilaian;
        $DataPenilaianArr = [];
        foreach ($GetDataPenilaian as $key => $value) {
            $DataPenilaianArr[$value->alternatif->kode_alternatif][$value->kriteria->kode_kriteria] = count(json_decode($value->kode_sub_kriteria_array));
        }

        foreach ($DataPenilaianArr as $key => $value) {
            foreach ($value as $a => $b) {
                $GroupingByKriteria[$a][] = $value[$a];
                $NilaiMaxArr[$a] = max($GroupingByKriteria[$a]);
                $nilaiMinArr[$a] = min($GroupingByKriteria[$a]);
            }
        }

        return [
            'maxKriteria' => $NilaiMaxArr,
            'minKriteria' => $nilaiMinArr
        ];
    }

    public function PerhitunganDataSPKMaut()
    {
        $NormalisasiDataSubKriteria = $this->NormalisasiDataSubKriteria();
        $GetDataPenilaian = $this->DataPenilaian;
        $DataPenilaianArr = [];
        foreach ($GetDataPenilaian as $key => $value) {
            $DataPenilaianArr[$value->alternatif->kode_alternatif][$value->kriteria->kode_kriteria] = count(json_decode($value->kode_sub_kriteria_array));
        }

        $DataPerhitungan1 = [];
        foreach ($DataPenilaianArr as $key => $value) {
            foreach ($value as $a => $b) {
                $DataPerhitungan1[$key][$a] = 0;
                if (($b - $NormalisasiDataSubKriteria['minKriteria'][$a]) != 0 && ($NormalisasiDataSubKriteria['maxKriteria'][$a] - $NormalisasiDataSubKriteria['minKriteria'][$a]) != 0) {
                    $DataPerhitungan1[$key][$a] = round(($b - $NormalisasiDataSubKriteria['minKriteria'][$a]) / ($NormalisasiDataSubKriteria['maxKriteria'][$a] - $NormalisasiDataSubKriteria['minKriteria'][$a]), 3);
                }
            }
        }

        return $DataPerhitungan1;
    }

    public function HasilPreferensi()
    {
        $HasilNormalisasiDataKriteria = $this->NormalisasiDataKriteria();
        $HasilPerhitungan = $this->PerhitunganDataSPKMaut();
        $HasilPerferensi = [];
        foreach ($HasilPerhitungan as $key => $value) {
            $HasilPerferensi[$key] = 0;
            foreach ($value as $a => $b) {
                $HasilPerferensi[$key] += round($b * $HasilNormalisasiDataKriteria[$a], 3);
            }
        }

        return $HasilPerferensi;
    }
}
