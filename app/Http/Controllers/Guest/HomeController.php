<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\DataPenilaian;

class HomeController extends Controller
{
    public function index()
    {
        $datas = [
            'titlePage' => 'Beranda',
            'dataAlternatif' => DataPenilaian::all()
        ];

        return view('guest.pages.home', $datas);
    }
}
