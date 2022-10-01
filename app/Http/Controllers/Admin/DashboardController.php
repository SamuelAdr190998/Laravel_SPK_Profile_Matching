<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Module\ProfileMatching;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $PerhitunganProfileMatching = new ProfileMatching();
        $PerhitunganProfileMatching->Result();
    }
}
