<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
        $datas = [
            'titlePage' => 'Tentang Aplikasi'
        ];

        return view('guest.pages.tentang', $datas);
    }
}
