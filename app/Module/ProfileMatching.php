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

    public function __construct($Penilaian = null, $Alternatif = null)
    {
        $this->AspekPenilaian = AspekPenilaian::all();
        $this->DataKriteria = KriteriaPenilaian::all();
        $this->DataSubkriteria = SubkriteriaPenilaian::all();
        $this->DataAlternatif = $Alternatif == null ? DataAlternatif::all() : $Alternatif;
        $this->DataPenilaian = $Penilaian == null ? DataPenilaian::all() : $Penilaian;
        $this->PemetaanGAPVal = PedomanGAP::all();
    }

    public function Result()
    {
        $hasilAkhirPerhitungan = $this->PerangkinganData();

        $displayDataConverter = [];
        $idx = 0;
        foreach ($hasilAkhirPerhitungan as $key => $value) {
            foreach ($this->AspekPenilaian as $a => $b) {
                foreach ($this->DataAlternatif as $c => $d) {
                    if ($key == $b->kode_aspek_penilaian) {
                        $displayDataConverter[$idx] = [
                            'kode_alternatif' => $d->kode_alternatif,
                            'nama_alternatif' => $d->nama_alternatif,
                            'nilai_total' => isset($value[$d->kode_alternatif]) ? $value[$d->kode_alternatif] : 0,
                        ];
                        $idx++;
                    }
                }
            }
        }

        return $displayDataConverter;
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
                if (floatval($PerhitunganNilaiGAP[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif][$value->kriteriapenilaian->kode_kriteria_penilaian]) == $b->ketentuan_selisih) {
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
            if ($value->kriteriapenilaian->status_kriteria_penilaian == "Faktor Utama") {
                if (isset($HasilPemetaanGAP[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif][$value->kriteriapenilaian->kode_kriteria_penilaian])) {
                    $hasilPenjumlahan[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif]['CF'] += $HasilPemetaanGAP[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif][$value->kriteriapenilaian->kode_kriteria_penilaian];
                }
            } elseif ($value->kriteriapenilaian->status_kriteria_penilaian == "Faktor Pendukung") {
                if (isset($HasilPemetaanGAP[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif][$value->kriteriapenilaian->kode_kriteria_penilaian])) {
                    $hasilPenjumlahan[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif]['SF'] += $HasilPemetaanGAP[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif][$value->kriteriapenilaian->kode_kriteria_penilaian];
                }
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
        $ResultAkhirPerangkinganDataArr = [];

        foreach ($this->DataPenilaian as $key => $value) {
            if ($value->kriteriapenilaian->status_kriteria_penilaian == "Faktor Utama") {
                $ResultAkhirPerangkinganDataArr[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif]['CF'] = round(($value->kriteriapenilaian->persentase_kriteria_penilaian / 100) * $HasilPengelompokkanCFdanSF[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif]['CF'], 1);
            } elseif ($value->kriteriapenilaian->status_kriteria_penilaian == "Faktor Pendukung") {
                $ResultAkhirPerangkinganDataArr[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif]['SF'] = round(($value->kriteriapenilaian->persentase_kriteria_penilaian / 100) * $HasilPengelompokkanCFdanSF[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif]['SF'], 1);
            }
        }

        $ResultAkhirPerangkinganData = [];
        foreach ($this->DataPenilaian as $key => $value) {
            $ResultAkhirPerangkinganData[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif] = $ResultAkhirPerangkinganDataArr[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif]['CF'] + $ResultAkhirPerangkinganDataArr[$value->aspekpenilaian->kode_aspek_penilaian][$value->alternatif->kode_alternatif]['SF'];
            arsort($ResultAkhirPerangkinganData[$value->aspekpenilaian->kode_aspek_penilaian]);
        }

        return $ResultAkhirPerangkinganData;
    }
}
