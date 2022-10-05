<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AspekPenilaian;
use App\Models\KriteriaPenilaian;
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
            'kriteriaPenilaian' => KriteriaPenilaian::all()
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
            'titlePage' => 'Tambah Kriteria Penilaian',
            'aspekPenilaian' => AspekPenilaian::all()
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
                'aspek_penilaian' => 'required',
                'kode_kriteria_penilaian' => 'required',
                'nama_kriteria_penilaian' => 'required',
                'bobot_kriteria_penilaian' => 'required',
                'status_kriteria_penilaian' => 'required',
                'persentase_kriteria_penilaian' => 'required'
            ],
            [
                'aspek_penilaian.required' => 'Field Aspek Penilaian Wajib Diisi',
                'kode_kriteria_penilaian.required' => 'Field Kode Kriteria Penilaian Wajib Diisi',
                'nama_kriteria_penilaian.required' => 'Field Nama Kriteria Penilaian Wajib Diisi',
                'bobot_kriteria_penilaian.required' => 'Field Bobot Kriteria Penilaian Wajib Diisi',
                'status_kriteria_penilaian.required' => 'Field Status Kriteria Penilaian Wajib Diisi',
                'persentase_kriteria_penilaian.required' => 'Field Persentase Kriteria Penilaian Wajib Diisi'
            ]
        );

        $NewKriteriaPenilaian = new KriteriaPenilaian();
        $NewKriteriaPenilaian->id_aspek_penilaian = $validateRequest['aspek_penilaian'];
        $NewKriteriaPenilaian->kode_kriteria_penilaian = $validateRequest['kode_kriteria_penilaian'];
        $NewKriteriaPenilaian->nama_kriteria_penilaian = $validateRequest['nama_kriteria_penilaian'];
        $NewKriteriaPenilaian->bobot_kriteria_penilaian = $validateRequest['bobot_kriteria_penilaian'];
        $NewKriteriaPenilaian->status_kriteria_penilaian = $validateRequest['status_kriteria_penilaian'];
        $NewKriteriaPenilaian->persentase_kriteria_penilaian = $validateRequest['persentase_kriteria_penilaian'];
        $NewKriteriaPenilaian->save();

        return redirect()->to('kriteria-penilaian')->with('successMessage', 'Berhasil menambahkan kriteria penilaian.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KriteriaPenilaian  $kriteriaPenilaian
     * @return \Illuminate\Http\Response
     */
    public function show(KriteriaPenilaian $kriteriaPenilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KriteriaPenilaian  $kriteriaPenilaian
     * @return \Illuminate\Http\Response
     */
    public function edit(KriteriaPenilaian $kriteriaPenilaian)
    {
        $datas = [
            'titlePage' => 'Kriteria Penilaian',
            'aspekPenilaian' => AspekPenilaian::all(),
            'kriteriaPenilaian' => $kriteriaPenilaian
        ];

        return view('admin.pages.kriteria-penilaian.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KriteriaPenilaian  $kriteriaPenilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KriteriaPenilaian $kriteriaPenilaian)
    {
        $validateRequest = $request->validate(
            [
                'aspek_penilaian' => 'required',
                'kode_kriteria_penilaian' => 'required|unique:kriteria_penilaian,kode_kriteria_penilaian,' . $kriteriaPenilaian->id,
                'nama_kriteria_penilaian' => 'required',
                'bobot_kriteria_penilaian' => 'required',
                'status_kriteria_penilaian' => 'required',
                'persentase_kriteria_penilaian' => 'required'
            ],
            [
                'aspek_penilaian.required' => 'Field Aspek Penilaian Wajib Diisi',
                'kode_kriteria_penilaian.required' => 'Field Kode Kriteria Penilaian Wajib Diisi',
                'kode_kriteria_penilaian.unique' => 'Kode Kriteria Penilaian ' . $request->get('kode_kriteria_penilaian') . ' Sudah Ada',
                'nama_kriteria_penilaian.required' => 'Field Nama Kriteria Penilaian Wajib Diisi',
                'bobot_kriteria_penilaian.required' => 'Field Bobot Kriteria Penilaian Wajib Diisi',
                'status_kriteria_penilaian.required' => 'Field Status Kriteria Penilaian Wajib Diisi',
                'persentase_kriteria_penilaian.required' => 'Field Persentase Kriteria Penilaian Wajib Diisi'
            ]
        );

        $kriteriaPenilaian->id_aspek_penilaian = $validateRequest['aspek_penilaian'];
        $kriteriaPenilaian->kode_kriteria_penilaian = $validateRequest['kode_kriteria_penilaian'];
        $kriteriaPenilaian->nama_kriteria_penilaian = $validateRequest['nama_kriteria_penilaian'];
        $kriteriaPenilaian->bobot_kriteria_penilaian = $validateRequest['bobot_kriteria_penilaian'];
        $kriteriaPenilaian->status_kriteria_penilaian = $validateRequest['status_kriteria_penilaian'];
        $kriteriaPenilaian->persentase_kriteria_penilaian = $validateRequest['persentase_kriteria_penilaian'];
        $kriteriaPenilaian->save();

        return redirect()->to('kriteria-penilaian')->with('successMessage', 'Berhasil mengubah kriteria penilaian.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KriteriaPenilaian  $kriteriaPenilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(KriteriaPenilaian $kriteriaPenilaian)
    {
        $kriteriaPenilaian->delete();
        return redirect()->to('kriteria-penilaian')->with('successMessage', 'Berhasil menghapus kriteria penilaian.');
    }
}
