<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataAlternatif;
use Illuminate\Http\Request;

class DataAlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = [
            'titlePage' => 'Data Alternatif',
            'dataAlternatif' => DataAlternatif::all()
        ];

        return view('admin.pages.data-alternatif.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = [
            'titlePage' => 'Tambah Data Alternatif'
        ];

        return view('admin.pages.data-alternatif.create', $datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateRequest = $request->validate(
            [
                'kode_alternatif' => 'required',
                'nama_alternatif' => 'required'
            ],
            [
                'kode_alternatif.required' => 'Field Kode Alternatif Wajib Diisi',
                'nama_alternatif.required' => 'Field Nama Alternatif Wajib Diisi'
            ]
        );

        $newDataAlternatif = new DataAlternatif();
        $newDataAlternatif->kode_alternatif = $validateRequest['kode_alternatif'];
        $newDataAlternatif->nama_alternatif = $validateRequest['nama_alternatif'];
        $newDataAlternatif->save();

        return redirect()->to('data-alternatif')->with('successMessage', 'Berhasil menambahkan data alternatif.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataAlternatif  $dataAlternatif
     * @return \Illuminate\Http\Response
     */
    public function show(DataAlternatif $dataAlternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataAlternatif  $dataAlternatif
     * @return \Illuminate\Http\Response
     */
    public function edit(DataAlternatif $dataAlternatif)
    {
        $datas = [
            'titlePage' => 'Ubah Data Alternatif',
            'dataAlternatif' => $dataAlternatif
        ];

        return view('admin.pages.data-alternatif.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataAlternatif  $dataAlternatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataAlternatif $dataAlternatif)
    {
        $validateRequest = $request->validate(
            [
                'kode_alternatif' => 'required|unique:data_alternatif,kode_alternatif,' . $dataAlternatif->id,
                'nama_alternatif' => 'required'
            ],
            [
                'kode_alternatif.required' => 'Field Kode Alternatif Wajib Diisi',
                'kode_alternatif.unique' => 'Kode Alternatif ' . $request->get('kode_alternatif') . ' Sudah Ada',
                'nama_alternatif.required' => 'Field Nama Alternatif Wajib Diisi'
            ]
        );

        $dataAlternatif->kode_alternatif = $validateRequest['kode_alternatif'];
        $dataAlternatif->nama_alternatif = $validateRequest['nama_alternatif'];
        $dataAlternatif->save();

        return redirect()->to('data-alternatif')->with('successMessage', 'Berhasil mengubah data alternatif.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataAlternatif  $dataAlternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataAlternatif $dataAlternatif)
    {
        $dataAlternatif->delete();
        return redirect()->to('data-alternatif')->with('successMessage', 'Berhasil menghapus data alternatif.');
    }
}
