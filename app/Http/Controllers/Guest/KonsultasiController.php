<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\DataAlternatif;
use App\Models\DataKriteria;
use App\Models\DataPenilaian;
use App\Models\DataSubKriteria;
use App\Modules\SPKMautAlgorithms;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function index()
    {
        $listJenisKos = [];
        foreach (DataAlternatif::all() as $key => $value) {
            $listJenisKos[$value->jenis_kos] = 0;
        }

        $datas = [
            'titlePage' => 'Konsultasi',
            'jenisKos' => $listJenisKos,
            'kriteriaPenilaian' => DataKriteria::all(),
            'subkriteriaPenilaian' => DataSubKriteria::all(),
            'countKriteria' => DataKriteria::count()
        ];

        return view('guest.pages.kriteria-kos.index', $datas);
    }

    public function prosesHitung(Request $request)
    {
        $DetailData = [];

        try {
            $rules = [
                'nama_lengkap' => 'required',
                'jenis_kos' => 'required',
                'checkbox-user' => 'required'
            ];

            $message = [
                'nama_lengkap.required' => 'Field Nama Lengkap Wajib Diisi',
                'jenis_kos.required' => 'Field Jenis Kos Wajib Diisi',
                'checkbox-user.required' => 'Setiap Field Pilihan Kategori Wajib Diisi',
            ];

            $KriteriaPenilaian = DataKriteria::all();
            foreach ($KriteriaPenilaian as $key => $value) {
                $rules['checkbox-user.' . $value->kode_kriteria] = 'required';
            }

            $validateRequest = $request->validate($rules, $message);

            $ValidationDataUser = $validateRequest['checkbox-user'];
            $DataUser = [];
            foreach (DataKriteria::all() as $key => $value) {
                $DataUser[$value->kode_kriteria] = count($ValidationDataUser[$value->kode_kriteria]);
            }

            $GetDataPenilaian = DataPenilaian::all();
            $DataPenilaianArr = [];
            foreach ($GetDataPenilaian as $key => $value) {
                $DataPenilaianArr[$value->alternatif->kode_alternatif][$value->kriteria->kode_kriteria] = count(json_decode($value->kode_sub_kriteria_array));
            }

            $newIndex = count($DataPenilaianArr);
            $HasilAkhirUser = $this->HasilPreferensi($DataUser)['U' . $newIndex + 1];

            $HasilRekomendasiAwal = [];
            $SPKMautFormula = new SPKMautAlgorithms();

            foreach ($SPKMautFormula->GenerateDataPenilaian() as $key => $value) {
                if ($value > $HasilAkhirUser) {
                    $HasilRekomendasiAwal[] = $key;
                }
            }

            foreach ($HasilRekomendasiAwal as $key => $value) {
                if (DataAlternatif::where([
                    'kode_alternatif' => $value,
                    'jenis_kos' => $validateRequest['jenis_kos']
                ])->first() != null) {
                    $DetailData[] = DataAlternatif::where([
                        'kode_alternatif' => $value,
                        'jenis_kos' => $validateRequest['jenis_kos']
                    ])->first()->toArray();
                }
            }
        } catch (\Throwable $th) {
            $DetailData = [];
        }


        $datas = [
            'titlePage' => 'Hasil Rekomendasi',
            'hasilRekomendasi' => $DetailData
        ];

        return view('guest.pages.kriteria-kos.hasil-konsultasi', $datas);
    }

    public function NormalisasiDataKriteria()
    {
        $GetDataKriteria = DataKriteria::all()->toArray();
        $TotalArrKriteria = 0;
        foreach ($GetDataKriteria as $key => $value) {
            $TotalArrKriteria += $value['bobot_kriteria'];
        }

        $RealTotalArrKriteria = [];
        if ($TotalArrKriteria != 1) {
            foreach ($GetDataKriteria as $key => $value) {
                $RealTotalArrKriteria[$value['kode_kriteria']] = round($value['bobot_kriteria'] / $TotalArrKriteria, 3);
            }
        } else {
            foreach ($GetDataKriteria as $key => $value) {
                $RealTotalArrKriteria[$value['kode_kriteria']] = round($value['kode_kriteria'], 3);
            }
        }

        return $RealTotalArrKriteria;
    }

    public function NormalisasiDataSubKriteria($newData)
    {
        $GetDataPenilaian = DataPenilaian::all();
        $DataPenilaianArr = [];
        foreach ($GetDataPenilaian as $key => $value) {
            $DataPenilaianArr[$value->alternatif->kode_alternatif][$value->kriteria->kode_kriteria] = count(json_decode($value->kode_sub_kriteria_array));
        }

        $newIndex = count($DataPenilaianArr);
        $DataPenilaianArr['U' . $newIndex + 1] = $newData;

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

    public function PerhitunganDataSPKMaut($newData)
    {
        $NormalisasiDataSubKriteria = $this->NormalisasiDataSubKriteria($newData);
        $GetDataPenilaian = DataPenilaian::all();
        $DataPenilaianArr = [];
        foreach ($GetDataPenilaian as $key => $value) {
            $DataPenilaianArr[$value->alternatif->kode_alternatif][$value->kriteria->kode_kriteria] = count(json_decode($value->kode_sub_kriteria_array));
        }

        $newIndex = count($DataPenilaianArr);
        $DataPenilaianArr['U' . $newIndex + 1] = $newData;

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

    public function HasilPreferensi($newData)
    {
        $HasilNormalisasiDataKriteria = $this->NormalisasiDataKriteria();
        $HasilPerhitungan = $this->PerhitunganDataSPKMaut($newData);
        $HasilPerferensi = [];
        foreach ($HasilPerhitungan as $key => $value) {
            $HasilPerferensi[$key] = 0;
            foreach ($value as $a => $b) {
                $HasilPerferensi[$key] += round($b * $HasilNormalisasiDataKriteria[$a], 3);
            }
        }

        return $HasilPerferensi;
    }

    public function showDataHitung($id_alternatif)
    {
        $dataAlternatif = DataAlternatif::find($id_alternatif);
        $dataShow['id'] = $dataAlternatif->id;
        $dataShow['nama_kos'] = $dataAlternatif->nama_kos;
        $dataShow['jenis_kos'] = $dataAlternatif->jenis_kos;
        $dataShow['lokasi_kos'] = $dataAlternatif->alamat_kos;

        $dataPenilaian = DataPenilaian::where('id_alternatif', $id_alternatif)->get();

        foreach ($dataPenilaian as $key => $value) {
            $dataShow['data_kriteria'][$key]['nama_kriteria'] = $value->kriteria->nama_kriteria;
            foreach (json_decode($value->kode_sub_kriteria_array) as $a => $b) {
                $dataSubKriteria[$a] = DataSubKriteria::where([
                    'id_kriteria' => $value->id_kriteria,
                    'kode_sub_kriteria' => $b
                ])->first()->toArray();
                $dataShow['data_kriteria'][$key]['list_kriteria'][$a] = $dataSubKriteria[$a]['nama_sub_kriteria'];
            }
        }

        $datas = [
            'titlePage' => 'Detail Hasil Kriteria',
            'detailHasil' => $dataShow
        ];

        // dd($dataShow);

        return view('guest.pages.kriteria-kos.detail-konsultasi', $datas);
    }
}
