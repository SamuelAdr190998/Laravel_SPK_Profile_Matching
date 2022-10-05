<?php

use App\Http\Controllers\Admin\AspekPenilaianController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataAlternatifController;
use App\Http\Controllers\Admin\DataPenilaianController;
use App\Http\Controllers\Admin\KriteriaPenilaianController;
use App\Http\Controllers\Admin\PedomanGAPController;
use App\Http\Controllers\Admin\SubkriteriaPenilaianController;
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

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::resource('aspek-penilaian', AspekPenilaianController::class);
Route::resource('data-alternatif', DataAlternatifController::class);
Route::resource('data-penilaian', DataPenilaianController::class);
Route::resource('kriteria-penilaian', KriteriaPenilaianController::class);
Route::resource('pedoman-gap', PedomanGAPController::class);
Route::resource('subkriteria-penilaian', SubkriteriaPenilaianController::class);
