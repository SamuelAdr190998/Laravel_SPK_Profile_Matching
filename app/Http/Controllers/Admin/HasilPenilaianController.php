<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Module\ProfileMatching;
use Illuminate\Http\Request;

class HasilPenilaianController extends Controller
{
    public function index()
    {
        $KalkulatorProfileMatching = new ProfileMatching();
        $oldData = $KalkulatorProfileMatching->Result();

        $nilaiTotal = array();
        foreach ($oldData as $key => $row) {
            $nilaiTotal[$key] = $row['nilai_total'];
        }
        array_multisort($nilaiTotal, SORT_DESC, $oldData);

        $i = 1;
        foreach ($oldData as $key => $value) {
            $oldData[$key]['ranking'] = $i;
            $i++;
        }

        $datas = [
            'titlePage' => 'Hasil Penilaian',
            'hasilPenilaian' => $oldData
        ];

        return view('admin.pages.hasilpenilaian', $datas);
    }
}
