<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataAlternatif;
use App\Models\DataKriteria;
use App\Models\DataPenilaian;
use App\Models\DataSubKriteria;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $datas = [
            'titlePage' => 'Dashboard',
            'dataalternatif' => DataAlternatif::count(),
            'datakriteria' => DataKriteria::count(),
            'datasubkriteria' => DataSubKriteria::count(),
            'datapenilaian' => DataPenilaian::count(),
            'datapengguna' => User::count()
        ];

        return view('admin.pages.dashboard', $datas);
    }
}
