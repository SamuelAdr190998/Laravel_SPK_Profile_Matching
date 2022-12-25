<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataAlternatif;
use App\Models\DataHistoryUser;
use App\Models\DataPenilaian;
use App\Models\DataSubKriteria;
use Illuminate\Http\Request;

class DataRiwayatKonsultasiController extends Controller
{
    public function index()
    {
        $datas = [
            'titlePage' => 'Data Riwayat Konsultasi',
            'dataRiwayatKonsultasi' => DataHistoryUser::all()
        ];

        return view('admin.pages.data-riwayat-konsultasi.index', $datas);
    }

    public function showData($id_riwayat_konsultasi)
    {
        $dataHistoryUser = DataHistoryUser::find($id_riwayat_konsultasi);
        $i = 0;

        $dataShowUser = [];
        try {
            foreach (json_decode($dataHistoryUser->hasil_penilaian) as $key => $value) {
                $dataAlternatifFetch = DataAlternatif::where('nama_kos', $value->nama_kos)->first();
                $dataShowUser[$i]['id'] = $dataAlternatifFetch->id;
                $dataShowUser[$i]['kode_alternatif'] = $dataAlternatifFetch->kode_alternatif;
                $dataShowUser[$i]['nama_kos'] = $dataAlternatifFetch->nama_kos;
                $dataShowUser[$i]['pemilik_kos'] = $dataAlternatifFetch->pemilik_kos;
                $dataShowUser[$i]['jenis_kos'] = $dataAlternatifFetch->jenis_kos;
                $dataShowUser[$i]['alamat_kos'] = $dataAlternatifFetch->alamat_kos;
                $dataShowUser[$i]['whatsapp_kos'] = $dataAlternatifFetch->whatsapp_kos;
                $dataShowUser[$i]['link_gambar'] = $dataAlternatifFetch->link_gambar_kos_1;
                $i++;
            }
        } catch (\Throwable $th) {
            $dataShowUser = [];
        }

        $datas = [
            'titlePage' => 'Detail Hasil Penilaian',
            'nama_user' => $dataHistoryUser->nama_user,
            'detailHasil' => $dataShowUser
        ];

        return view('admin.pages.data-riwayat-konsultasi.hasil-konsultasi', $datas);
    }

    public function showDataDetailKonsultasi($id_alternatif)
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
            'detailHasil' => $dataShow,
            'linkGambar' => [
                'link_gambar_1' => $dataAlternatif->link_gambar_kos_1,
                'link_gambar_2' => $dataAlternatif->link_gambar_kos_2,
                'link_gambar_3' => $dataAlternatif->link_gambar_kos_3,
            ]
        ];

        return view('admin.pages.data-riwayat-konsultasi.detail-konsultasi', $datas);
    }
}
