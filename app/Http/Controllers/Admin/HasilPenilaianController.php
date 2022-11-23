<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataAlternatif;
use App\Modules\SPKMautAlgorithms;
use Illuminate\Http\Request;

class HasilPenilaianController extends Controller
{
    public function index()
    {
        $KalkulatorSPKMautAlgorithms = new SPKMautAlgorithms();
        $oldData = $KalkulatorSPKMautAlgorithms->GenerateDataPenilaian();

        $dataAlternatif = [];
        foreach (DataAlternatif::all() as $key => $value) {
            $dataAlternatifArr['kode_alternatif'] = $value->kode_alternatif;
            $dataAlternatifArr['nama_kos'] = $value->nama_kos;
            $dataAlternatifArr['link_kos'] = $value->link_kos;
            $dataAlternatifArr['pemilik_kos'] = $value->pemilik_kos;
            $dataAlternatifArr['jenis_kos'] = $value->jenis_kos;
            $dataAlternatifArr['alamat_kos'] = $value->alamat_kos;
            $dataAlternatifArr['whatsapp_kos'] = $value->whatsapp_kos;
            $dataAlternatifArr['nilai_kos'] = isset($oldData[$value->kode_alternatif]) ? $oldData[$value->kode_alternatif] : 0;

            array_push($dataAlternatif, $dataAlternatifArr);
        }

        $price = array_column($dataAlternatif, 'nilai_kos');
        array_multisort($price, SORT_DESC, $dataAlternatif);

        $datas = [
            'titlePage' => 'Hasil Penilaian',
            'hasilPenilaian' => $dataAlternatif
        ];

        return view('admin.pages.hasilpenilaian', $datas);
    }
}
