<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AspekPenilaian;
use App\Models\DataAlternatif;
use App\Models\KriteriaPenilaian;
use App\Models\PedomanGAP;
use App\Models\SubkriteriaPenilaian;
use App\Models\User;
use App\Module\ProfileMatching;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $datas = [
            'titlePage' => 'Dashboard',
            'aspekPenilaian' => AspekPenilaian::count(),
            'kriteriaPenilaian' => KriteriaPenilaian::count(),
            'subKriteriaPenilaian' => SubkriteriaPenilaian::count(),
            'pedomanGAP' => PedomanGAP::count(),
            'dataalternatif' => DataAlternatif::count(),
            'datapengguna' => User::count()
        ];

        return view('admin.pages.dashboard', $datas);
    }
}
