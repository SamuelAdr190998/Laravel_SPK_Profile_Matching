<?php

use App\Http\Controllers\Admin\AspekPenilaianController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataAlternatifController;
use App\Http\Controllers\Admin\DataPenggunaController;
use App\Http\Controllers\Admin\DataPenilaianController;
use App\Http\Controllers\Admin\HasilPenilaianController;
use App\Http\Controllers\Admin\KriteriaPenilaianController;
use App\Http\Controllers\Admin\PedomanGAPController;
use App\Http\Controllers\Admin\SubkriteriaPenilaianController;
use App\Http\Controllers\Admin\UbahPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\KonsultasiController;
use App\Http\Controllers\Guest\TentangController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/konsultasi', [KonsultasiController::class, 'index']);
    Route::post('/konsultasi', [KonsultasiController::class, 'prosesHitung']);
    Route::get('/tentang', [TentangController::class, 'index']);
    Route::get('/login', [LoginController::class, 'indexLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'logicLogin']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::resource('aspek-penilaian', AspekPenilaianController::class);
    Route::resource('data-alternatif', DataAlternatifController::class);
    Route::resource('data-penilaian', DataPenilaianController::class);
    Route::resource('kriteria-penilaian', KriteriaPenilaianController::class);
    Route::resource('pedoman-gap', PedomanGAPController::class)->only('index');
    Route::resource('subkriteria-penilaian', SubkriteriaPenilaianController::class);
    Route::resource('hasil-penilaian', HasilPenilaianController::class);
    Route::get('ubah-password', [UbahPasswordController::class, 'index']);
    Route::post('ubah-password', [UbahPasswordController::class, 'store']);
    Route::get('logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    });
});
