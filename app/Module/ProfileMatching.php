<?php

namespace App\Module;

use App\Models\AspekPenilaian;
use App\Models\DataAlternatif;
use App\Models\DataPenilaian;
use App\Models\KriteriaPenilaian;
use App\Models\PedomanGAP;
use App\Models\SubkriteriaPenilaian;

class ProfileMatching
{

    protected $AspekPenilaian;
    protected $DataKriteria;
    protected $DataSubkriteria;
    protected $DataAlternatif;
    protected $DataPenilaian;
    protected $PemetaanGAPVal;

    public function __construct()
    {
        $this->AspekPenilaian = AspekPenilaian::all();
        $this->DataKriteria = KriteriaPenilaian::all();
        $this->DataSubkriteria = SubkriteriaPenilaian::all();
        $this->DataAlternatif = DataAlternatif::all();
        $this->DataPenilaian = DataPenilaian::all();
        $this->PemetaanGAPVal = PedomanGAP::all();
    }

    public function Result()
    {
        echo "<pre>";
        print_r('Perhitungan Nilai GAP');
        echo "</br>";
        print_r($this->MenghitungNilaiGAP());
        echo "</pre>";

        echo "</br>";
        echo "</br>";

        echo "<pre>";
        print_r('Perhitungan Pemetaan GAP');
        echo "</br>";
        print_r($this->PemetaanGAP());
        echo "</pre>";

        echo "</br>";
        echo "</br>";

        echo "<pre>";
        print_r('Perhitungan Pengelompokkan CF dan SF');
        echo "</br>";
        print_r($this->PengelompokkanCFdanSF());
        echo "</pre>";

        echo "</br>";
        echo "</br>";

        echo "<pre>";
        print_r('Perhitungan Perangkingan Data');
        echo "</br>";
        print_r($this->PerangkinganData());
        echo "</pre>";
    }

    // Step 1 : Menentukan Aspek Penilaian dan Nilai Bobot Standar Kompetensi
    // Step 2 : Menghitung GAP
    public function MenghitungNilaiGAP()
    {
        $manipulasiDataGAP = [];
        foreach ($this->DataPenilaian as $key => $value) {
            $manipulasiDataGAP[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif][$value->kriteriapenilaian->kode_kriteria_penilaian] = $value->subkriteriapenilaian->bobot_subkriteria_penilaian - $value->kriteriapenilaian->bobot_kriteria_penilaian;
        }

        return $manipulasiDataGAP;
    }

    // Step 3 : Pemetaaan GAP
    public function PemetaanGAP()
    {
        $PerhitunganNilaiGAP = $this->MenghitungNilaiGAP();
        $resultKonversiNilaiGAP = [];
        foreach ($this->DataPenilaian as $key => $value) {
            foreach ($this->PemetaanGAPVal as $a => $b) {
                $PerhitunganNilaiGAP[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif][$value->kriteriapenilaian->kode_kriteria_penilaian] = $value->subkriteriapenilaian->bobot_subkriteria_penilaian - $value->kriteriapenilaian->bobot_kriteria_penilaian;
                if (floatval($PerhitunganNilaiGAP[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif][$value->kriteriapenilaian->kode_kriteria_penilaian]) === $b->ketentuan_selisih) {
                    $resultKonversiNilaiGAP[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif][$value->kriteriapenilaian->kode_kriteria_penilaian] = $b->bobot_nilai;
                }
            }
        }

        return $resultKonversiNilaiGAP;
    }

    // Step 4 : Pengelompokkan Core Factor (CF) dan Secondary Factor (SF)
    public function PengelompokkanCFdanSF()
    {
        $HasilPemetaanGAP = $this->PemetaanGAP();
        $countKelompokCF = KriteriaPenilaian::where('status_kriteria_penilaian', 'Faktor Utama')->count();
        $countKelompokSF = KriteriaPenilaian::where('status_kriteria_penilaian', 'Faktor Pendukung')->count();
        $resultPengelompokkan = [];
        $hasilPenjumlahan = [];

        foreach ($this->DataPenilaian as $key => $value) {
            $hasilPenjumlahan[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif]['CF'] = 0;
            $hasilPenjumlahan[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif]['SF'] = 0;
        }

        foreach ($this->DataPenilaian as $key => $value) {
            if ($value->kriteriapenilaian->status_kriteria_penilaian === "Faktor Utama") {
                $hasilPenjumlahan[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif]['CF'] += $HasilPemetaanGAP[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif][$value->kriteriapenilaian->kode_kriteria_penilaian];
            } elseif ($value->kriteriapenilaian->status_kriteria_penilaian === "Faktor Pendukung") {
                $hasilPenjumlahan[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif]['SF'] += $HasilPemetaanGAP[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif][$value->kriteriapenilaian->kode_kriteria_penilaian];
            }
            $resultPengelompokkan[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif]['CF'] = round($hasilPenjumlahan[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif]['CF'] / $countKelompokCF, 3);
            $resultPengelompokkan[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif]['SF'] = round($hasilPenjumlahan[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif]['SF'] / $countKelompokSF, 3);
        }

        return $resultPengelompokkan;
    }

    // Step 5 : Perhitungan Nilai Total (NT) dan Perangkingan
    public function PerangkinganData()
    {
        $HasilPengelompokkanCFdanSF = $this->PengelompokkanCFdanSF();
        $ResultAkhirPerangkinganData = [];
        foreach ($this->DataPenilaian as $key => $value) {
            $ResultAkhirPerangkinganData[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif] = round(((60 / 100) * $HasilPengelompokkanCFdanSF[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif]['CF']) + ((40 / 100) * $HasilPengelompokkanCFdanSF[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif]['SF']), 3);
        }

        arsort($ResultAkhirPerangkinganData[$value->aspekpenilaian->kode_aspek_penilaian]);

        return $ResultAkhirPerangkinganData;
    }
}
