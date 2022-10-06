<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AspekPenilaian;
use App\Models\DataAlternatif;
use App\Models\DataPenilaian;
use App\Models\KriteriaPenilaian;
use Illuminate\Http\Request;

class DataPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = [
            'titlePage' => 'Data Penilaian',
            'dataAlternatif' => DataAlternatif::all(),
            'aspekPenilaian' => AspekPenilaian::all(),
            'kriteriaPenilaian' => KriteriaPenilaian::all(),
            'dataPenilaian' => DataPenilaian::all()
        ];

        return view('admin.pages.data-penilaian.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataPenilaian  $dataPenilaian
     * @return \Illuminate\Http\Response
     */
    public function show(DataPenilaian $dataPenilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPenilaian  $dataPenilaian
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPenilaian $dataPenilaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPenilaian  $dataPenilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPenilaian $dataPenilaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPenilaian  $dataPenilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPenilaian $dataPenilaian)
    {
        //
    }
}
