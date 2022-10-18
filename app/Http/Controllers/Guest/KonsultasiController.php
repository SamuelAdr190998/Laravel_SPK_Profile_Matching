<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\AspekPenilaian;
use App\Models\DataAlternatif;
use App\Models\DataAlternatifUser;
use App\Models\DataPenilaian;
use App\Models\DataPenilaianUser;
use App\Models\KriteriaPenilaian;
use App\Models\SubkriteriaPenilaian;
use App\Models\PedomanGAP;
use App\Module\ProfileMatching;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonsultasiController extends Controller
{
    public function index()
    {
        $datas = [
            'titlePage' => 'Konsultasi',
            'aspekPenilaian' => AspekPenilaian::all(),
            'kriteriaPenilaian' => KriteriaPenilaian::all(),
            'subkriteriaPenilaian' => SubkriteriaPenilaian::all()
        ];

        return view('guest.pages.konsultasi', $datas);
    }

    public function prosesHitung(Request $request)
    {
        $rules = [
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required'
        ];

        $message = [
            'nama_pasien.required' => 'Field Nama Pasien Wajib Diisi',
            'jenis_kelamin.required' => 'Field Jenis Kelamin Wajib Diisi'
        ];

        $KriteriaPenilaian = KriteriaPenilaian::all();
        foreach ($KriteriaPenilaian as $key => $value) {
            $rules['field_' . $value->kode_kriteria_penilaian] = 'required';
            $message['field_' . $value->kode_kriteria_penilaian . '.required'] = 'Field ' . $value->nama_kriteria_penilaian . ' Wajib Diisi';
        }

        $validateRequest = $request->validate($rules, $message);

        // Manipulasi Data GAP
        $manipulasiDataGAP = [];
        foreach (AspekPenilaian::all() as $key => $value) {
            $manipulasiDataGAP[$value->kode_aspek_penilaian] = [];
            foreach (KriteriaPenilaian::all() as $a => $b) {
                foreach (SubkriteriaPenilaian::all() as $c => $d) {
                    if ($d->id == $validateRequest['field_' . $b->kode_kriteria_penilaian]) {
                        $manipulasiDataGAP[$value->kode_aspek_penilaian]['U1'][$b->kode_kriteria_penilaian] = $d->bobot_subkriteria_penilaian - $b->bobot_kriteria_penilaian;
                    }
                }
            }
        }

        // Pemetaaan GAP
        $PerhitunganNilaiGAP = $manipulasiDataGAP;
        $resultKonversiNilaiGAP = [];
        foreach (AspekPenilaian::all() as $key => $value) {
            foreach (KriteriaPenilaian::all() as $a => $b) {
                foreach (PedomanGAP::all() as $c => $d) {
                    if (floatval($manipulasiDataGAP[$value->kode_aspek_penilaian]['U1'][$b->kode_kriteria_penilaian]) == $d->ketentuan_selisih) {
                        $resultKonversiNilaiGAP[$value->kode_aspek_penilaian]['U1'][$b->kode_kriteria_penilaian] = $d->bobot_nilai;
                    }
                }
            }
        }

        // Pengelompokkan Core Factor (CF) dan Secondary Factor (SF)
        $HasilPemetaanGAP = $resultKonversiNilaiGAP;
        $countKelompokCF = KriteriaPenilaian::where('status_kriteria_penilaian', 'Faktor Utama')->count();
        $countKelompokSF = KriteriaPenilaian::where('status_kriteria_penilaian', 'Faktor Pendukung')->count();
        $resultPengelompokkan = [];
        $hasilPenjumlahan = [];

        foreach (AspekPenilaian::all() as $key => $value) {
            $hasilPenjumlahan[$value->kode_aspek_penilaian]['U1']['CF'] = 0;
            $hasilPenjumlahan[$value->kode_aspek_penilaian]['U1']['SF'] = 0;
        }

        foreach (AspekPenilaian::all() as $key => $value) {
            foreach (KriteriaPenilaian::all() as $a => $b) {
                if ($b->status_kriteria_penilaian == "Faktor Utama") {
                    if (isset($HasilPemetaanGAP[$value->kode_aspek_penilaian]['U1'][$b->kode_kriteria_penilaian])) {
                        $hasilPenjumlahan[$value->kode_aspek_penilaian]['U1']['CF'] += $HasilPemetaanGAP[$value->kode_aspek_penilaian]['U1'][$b->kode_kriteria_penilaian];
                    }
                } elseif ($b->status_kriteria_penilaian == "Faktor Pendukung") {
                    if (isset($HasilPemetaanGAP[$value->kode_aspek_penilaian]['U1'][$b->kode_kriteria_penilaian])) {
                        $hasilPenjumlahan[$value->kode_aspek_penilaian]['U1']['SF'] += $HasilPemetaanGAP[$value->kode_aspek_penilaian]['U1'][$b->kode_kriteria_penilaian];
                    }
                }
                $resultPengelompokkan[$value->kode_aspek_penilaian]['U1']['CF'] = round($hasilPenjumlahan[$value->kode_aspek_penilaian]['U1']['CF'] / $countKelompokCF, 3);
                $resultPengelompokkan[$value->kode_aspek_penilaian]['U1']['SF'] = round($hasilPenjumlahan[$value->kode_aspek_penilaian]['U1']['SF'] / $countKelompokSF, 3);
            }
        }

        // Perhitungan Nilai Total (NT) dan Perangkingan
        $HasilPengelompokkanCFdanSF = $resultPengelompokkan;
        $ResultAkhirPerangkinganDataArr = [];
        foreach (AspekPenilaian::all() as $key => $value) {
            foreach (KriteriaPenilaian::all() as $a => $b) {
                if ($b->status_kriteria_penilaian == 'Faktor Utama') {
                    $ResultAkhirPerangkinganDataArr[$value->kode_aspek_penilaian]['U1']['CF'] = round(($b->persentase_kriteria_penilaian / 100) * $HasilPengelompokkanCFdanSF[$value->kode_aspek_penilaian]['U1']['CF'], 3);
                } elseif ($b->status_kriteria_penilaian == 'Faktor Pendukung') {
                    $ResultAkhirPerangkinganDataArr[$value->kode_aspek_penilaian]['U1']['SF'] = round(($b->persentase_kriteria_penilaian / 100) * $HasilPengelompokkanCFdanSF[$value->kode_aspek_penilaian]['U1']['SF'], 3);
                }
            }
        }

        $ResultAkhirPerangkinganData = [];
        foreach (AspekPenilaian::all() as $key => $value) {
            foreach (KriteriaPenilaian::all() as $a => $b) {
                $ResultAkhirPerangkinganData = $ResultAkhirPerangkinganDataArr[$value->kode_aspek_penilaian]['U1']['CF'] + $ResultAkhirPerangkinganDataArr[$value->kode_aspek_penilaian]['U1']['SF'];
            }
        }

        $ProfileMatchingMethod = new ProfileMatching();
        $ArrResult = $ProfileMatchingMethod->Result();

        // Comparing
        $displayResult = "";
        $nilaiResult = "";

        $statusCatch = false;
        foreach ($ArrResult as $key => $value) {
            if ($value['nilai_total'] == $ResultAkhirPerangkinganData) {
                $nilaiResult = $value['nilai_total'];
                $displayResult = $value['nama_alternatif'];
            } else if ($value['nilai_total'] > $ResultAkhirPerangkinganData) {
                $nilaiResult = $value['nilai_total'];
                $displayResult = $value['nama_alternatif'];
            }
        }

        $JSONResult = [
            'Nama_Pasien' => $validateRequest['nama_pasien'],
            'Jenis_Kelamin' => $validateRequest['jenis_kelamin'],
            'Data_Hasil' => $displayResult
        ];

        return back()->with('resultJSON', $JSONResult);
    }
}
