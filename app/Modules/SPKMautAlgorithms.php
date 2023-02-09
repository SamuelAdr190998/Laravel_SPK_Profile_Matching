<?php

namespace App\Modules;

use App\Models\DataAlternatif;
use App\Models\DataKriteria;
use App\Models\DataPenilaian;
use App\Models\DataSubKriteria;
use PDO;

class SPKMautAlgorithms
{
    protected $DataPenilaian;

    protected function getDataPenilaian()
    {
        if (empty($this->DataPenilaian)) {
            $this->DataPenilaian = DataPenilaian::all();
        }

        return $this->DataPenilaian;
    }

    public function GenerateDataPenilaian()
    {
        return $this->HasilPreferensi();
    }

    protected function NormalisasiDataKriteria()
    {
        $GetDataKriteria = DataKriteria::all();
        $TotalArrKriteria = $GetDataKriteria->sum(fn ($item) => $item->bobot_kriteria);

        return $GetDataKriteria->mapWithKeys(fn ($item) => [
            $item->kode_kriteria => $TotalArrKriteria == 1
                ? round($item->bobot_kriteria, 3)
                : round($item->bobot_kriteria / $TotalArrKriteria, 3)
        ])->all();
    }

    protected function NormalisasiDataSubKriteria()
    {
        $GetDataPenilaian = $this->getDataPenilaian();

        foreach ($GetDataPenilaian as $key => $value) {
            foreach (json_decode($GetDataPenilaian[$key]['kode_sub_kriteria_array']) as $keySubK => $valSubK) {
                $valueSubK[$key][$keySubK] = DataSubKriteria::where('kode_sub_kriteria', $valSubK)->first()->toArray()['bobot_sub_kriteria'];
            }
            $GetDataPenilaian[$key]['kode_sub_kriteria_array'] = array_sum($valueSubK[$key]);
        }

        $handleMap = fn ($item) => [$item->kriteria->kode_kriteria => $item->kode_sub_kriteria_array];
        $maxKriteria = $GetDataPenilaian->mapToGroups($handleMap)->map(fn ($item) => $item->max())->all();
        $minKriteria = $GetDataPenilaian->mapToGroups($handleMap)->map(fn ($item) => $item->min())->all();

        return compact('maxKriteria', 'minKriteria');
    }

    protected function PerhitunganDataSPKMaut()
    {
        $NormalisasiDataSubKriteria = $this->NormalisasiDataSubKriteria();
        $GetDataPenilaian = $this->getDataPenilaian();

        return $GetDataPenilaian
            ->mapToGroups(fn ($item) => [$item->alternatif->kode_alternatif => $item])
            ->map(fn ($item) => $item->mapWithKeys(fn ($value) => [$value->kriteria->kode_kriteria => $value->kode_sub_kriteria_array]))
            ->map(fn ($item) => $item->map(fn ($value, $key) => ($value - $NormalisasiDataSubKriteria['minKriteria'][$key]) != 0 && ($NormalisasiDataSubKriteria['maxKriteria'][$key] - $NormalisasiDataSubKriteria['minKriteria'][$key]) != 0
                ? round(($value - $NormalisasiDataSubKriteria['minKriteria'][$key]) / ($NormalisasiDataSubKriteria['maxKriteria'][$key] - $NormalisasiDataSubKriteria['minKriteria'][$key]), 3)
                : 0)->all())->all();
    }

    protected function HasilPreferensi()
    {
        $HasilNormalisasiDataKriteria = $this->NormalisasiDataKriteria();
        $HasilPerhitungan = $this->PerhitunganDataSPKMaut();

        return collect($HasilPerhitungan)
            ->map(fn ($item) => collect($item)
                ->map(fn ($val, $key) => round($val * $HasilNormalisasiDataKriteria[$key], 3))
                ->sum())
            ->all();
    }
}
