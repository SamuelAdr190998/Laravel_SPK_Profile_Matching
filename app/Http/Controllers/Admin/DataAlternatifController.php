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
                'kode_alternatif' => 'required|unique:data_alternatif,kode_alternatif',
                'nama_kos' => 'required',
                'link_kos' => 'required',
                'pemilik_kos' => 'required',
                'jenis_kos' => 'required',
                'alamat_kos' => 'required',
                'whatsapp_kos' => 'required'
            ],
            [
                'kode_alternatif.required' => 'Field Kode Alternatif Wajib Diisi',
                'kode_alternatif.unique' => 'Kode Alternatif ' . $request->get('kode_alternatif') . ' Sudah Ada',
                'nama_kos.required' => 'Field Nama Kos Wajib Diisi',
                'link_kos.required' => 'Field Link Kos Wajib Diisi',
                'pemilik_kos.required' => 'Field Pemilik Kos Wajib Diisi',
                'jenis_kos.required' => 'Field Jenis Kos Wajib Diisi',
                'alamat_kos.required' => 'Field Alamat Kos Wajib Diisi',
                'whatsapp_kos.required' => 'Field Whatsapp Kos Wajib Diisi'
            ]
        );

        $newDataAlternatif = new DataAlternatif();
        $newDataAlternatif->kode_alternatif = $validateRequest['kode_alternatif'];
        $newDataAlternatif->nama_kos = $validateRequest['nama_kos'];
        $newDataAlternatif->link_kos = $validateRequest['link_kos'];
        $newDataAlternatif->pemilik_kos = $validateRequest['pemilik_kos'];
        $newDataAlternatif->jenis_kos = $validateRequest['jenis_kos'];
        $newDataAlternatif->alamat_kos = $validateRequest['alamat_kos'];
        $newDataAlternatif->whatsapp_kos = $validateRequest['whatsapp_kos'];
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
                'nama_kos' => 'required',
                'link_kos' => 'required',
                'pemilik_kos' => 'required',
                'jenis_kos' => 'required',
                'alamat_kos' => 'required',
                'whatsapp_kos' => 'required'
            ],
            [
                'kode_alternatif.required' => 'Field Kode Alternatif Wajib Diisi',
                'kode_alternatif.unique' => 'Kode Alternatif ' . $request->get('kode_alternatif') . ' Sudah Ada',
                'nama_kos.required' => 'Field Nama Kos Wajib Diisi',
                'link_kos.required' => 'Field Link Kos Wajib Diisi',
                'pemilik_kos.required' => 'Field Pemilik Kos Wajib Diisi',
                'jenis_kos.required' => 'Field Jenis Kos Wajib Diisi',
                'alamat_kos.required' => 'Field Alamat Kos Wajib Diisi',
                'whatsapp_kos.required' => 'Field Whatsapp Kos Wajib Diisi'
            ]
        );

        $dataAlternatif->kode_alternatif = $validateRequest['kode_alternatif'];
        $dataAlternatif->nama_kos = $validateRequest['nama_kos'];
        $dataAlternatif->link_kos = $validateRequest['link_kos'];
        $dataAlternatif->pemilik_kos = $validateRequest['pemilik_kos'];
        $dataAlternatif->jenis_kos = $validateRequest['jenis_kos'];
        $dataAlternatif->alamat_kos = $validateRequest['alamat_kos'];
        $dataAlternatif->whatsapp_kos = $validateRequest['whatsapp_kos'];
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
