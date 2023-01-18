<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataKriteria;
use Illuminate\Http\Request;

class KriteriaPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = [
            'titlePage' => 'Kriteria Penilaian',
            'kriteriaPenilaian' => DataKriteria::all()
        ];

        return view('admin.pages.kriteria-penilaian.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = [
            'titlePage' => 'Tambah Kriteria Penilaian'
        ];

        return view('admin.pages.kriteria-penilaian.create', $datas);
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
                'kode_kriteria_penilaian' => 'required|unique:data_kriteria,kode_kriteria',
                'nama_kriteria_penilaian' => 'required',
                'bobot_kriteria_penilaian' => 'required'
            ],
            [
                'kode_kriteria_penilaian.required' => 'Field Kode Kriteria Penilaian Wajib Diisi',
                'kode_kriteria_penilaian.unique' => 'Kode Kriteria Penilaian ' . $request->get('kode_kriteria_penilaian') . ' Telah Ada',
                'nama_kriteria_penilaian.required' => 'Field Nama Kriteria Penilaian Wajib Diisi',
                'bobot_kriteria_penilaian.required' => 'Field Bobot Kriteria Penilaian Wajib Diisi'
            ]
        );

        $NewKriteriaPenilaian = new DataKriteria();
        $NewKriteriaPenilaian->kode_kriteria = $validateRequest['kode_kriteria_penilaian'];
        $NewKriteriaPenilaian->nama_kriteria = $validateRequest['nama_kriteria_penilaian'];
        $NewKriteriaPenilaian->bobot_kriteria = $validateRequest['bobot_kriteria_penilaian'];
        $NewKriteriaPenilaian->save();

        return redirect()->to('data-kriteria')->with('successMessage', 'Berhasil menambahkan kriteria penilaian.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataKriteria  $kriteriaPenilaian
     * @return \Illuminate\Http\Response
     */
    public function show(DataKriteria $kriteriaPenilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataKriteria  $kriteriaPenilaian
     * @return \Illuminate\Http\Response
     */
    public function edit(DataKriteria $kriteriaPenilaian, $data_kriteria)
    {
        $kriteriaPenilaian = DataKriteria::find($data_kriteria);

        $datas = [
            'titlePage' => 'Kriteria Penilaian',
            'kriteriaPenilaian' => $kriteriaPenilaian
        ];

        return view('admin.pages.kriteria-penilaian.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataKriteria  $kriteriaPenilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataKriteria $kriteriaPenilaian, $data_kriteria)
    {
        $validateRequest = $request->validate(
            [
                'kode_kriteria_penilaian' => 'required',
                'nama_kriteria_penilaian' => 'required',
                'bobot_kriteria_penilaian' => 'required'
            ],
            [
                'kode_kriteria_penilaian.required' => 'Field Kode Kriteria Penilaian Wajib Diisi',
                'kode_kriteria_penilaian.unique' => 'Kode Kriteria Penilaian ' . $request->get('kode_kriteria_penilaian') . ' Sudah Ada',
                'nama_kriteria_penilaian.required' => 'Field Nama Kriteria Penilaian Wajib Diisi',
                'bobot_kriteria_penilaian.required' => 'Field Bobot Kriteria Penilaian Wajib Diisi'
            ]
        );

        $kriteriaPenilaian = DataKriteria::find($data_kriteria);
        $kriteriaPenilaian->kode_kriteria = $validateRequest['kode_kriteria_penilaian'];
        $kriteriaPenilaian->nama_kriteria = $validateRequest['nama_kriteria_penilaian'];
        $kriteriaPenilaian->bobot_kriteria = $validateRequest['bobot_kriteria_penilaian'];
        $kriteriaPenilaian->save();

        return redirect()->to('data-kriteria')->with('successMessage', 'Berhasil mengubah kriteria penilaian.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataKriteria  $kriteriaPenilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataKriteria $kriteriaPenilaian, $data_kriteria)
    {
        $kriteriaPenilaian = DataKriteria::find($data_kriteria);
        $kriteriaPenilaian->delete();
        return redirect()->to('data-kriteria')->with('successMessage', 'Berhasil menghapus kriteria penilaian.');
    }
}
