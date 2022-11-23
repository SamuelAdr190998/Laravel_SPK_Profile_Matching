<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BantuanController extends Controller
{
    public function index()
    {
        $datas = [
            'titlePage' => 'Bantuan'
        ];

        return view('guest.pages.bantuan', $datas);
    }
}
