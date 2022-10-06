<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AspekPenilaian;
use App\Models\KriteriaPenilaian;
use App\Models\SubkriteriaPenilaian;
use Illuminate\Http\Request;

class SubkriteriaPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = [
            'titlePage' => 'Subkriteria Penilaian',
            'subkriteriaPenilaian' => SubkriteriaPenilaian::all()
        ];

        return view('admin.pages.subkriteria-penilaian.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = [
            'titlePage' => 'Tambah Subkriteria Penilaian',
            'kriteriaPenilaian' => KriteriaPenilaian::all()
        ];

        return view('admin.pages.subkriteria-penilaian.create', $datas);
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
                'kriteria_penilaian' => 'required',
                'kode_subkriteria_penilaian' => 'required',
                'nama_subkriteria_penilaian' => 'required',
                'bobot_subkriteria_penilaian' => 'required'
            ],
            [
                'kriteria_penilaian.required' => 'Field Kriteria Penilaian Wajib Diisi',
                'kode_subkriteria_penilaian.required' => 'Field Kode Subkriteria Penilaian Wajib Diisi',
                'nama_subkriteria_penilaian.required' => 'Field Nama Subkriteria Penilaian Wajib Diisi',
                'bobot_subkriteria_penilaian.required' => 'Field Bobot Subkriteria Penilaian Wajib Diisi'
            ]
        );

        $NewSubkriteriaPenilaian = new SubkriteriaPenilaian();
        $NewSubkriteriaPenilaian->id_kriteria_penilaian = $validateRequest['kriteria_penilaian'];
        $NewSubkriteriaPenilaian->kode_subkriteria_penilaian = $validateRequest['kode_subkriteria_penilaian'];
        $NewSubkriteriaPenilaian->nama_subkriteria_penilaian = $validateRequest['nama_subkriteria_penilaian'];
        $NewSubkriteriaPenilaian->bobot_subkriteria_penilaian = $validateRequest['bobot_subkriteria_penilaian'];
        $NewSubkriteriaPenilaian->save();

        return redirect()->to('subkriteria-penilaian')->with('successMessage', 'Berhasil menambahkan subkriteria penilaian');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubkriteriaPenilaian  $subkriteriaPenilaian
     * @return \Illuminate\Http\Response
     */
    public function show(SubkriteriaPenilaian $subkriteriaPenilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubkriteriaPenilaian  $subkriteriaPenilaian
     * @return \Illuminate\Http\Response
     */
    public function edit(SubkriteriaPenilaian $subkriteriaPenilaian)
    {
        $datas = [
            'titlePage' => 'Tambah Subkriteria Penilaian',
            'kriteriaPenilaian' => KriteriaPenilaian::all(),
            'subkriteriaPenilaian' => $subkriteriaPenilaian
        ];

        return view('admin.pages.subkriteria-penilaian.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubkriteriaPenilaian  $subkriteriaPenilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubkriteriaPenilaian $subkriteriaPenilaian)
    {
        $validateRequest = $request->validate(
            [
                'kriteria_penilaian' => 'required',
                'kode_subkriteria_penilaian' => 'required|unique:subkriteria_penilaian,kode_subkriteria_penilaian,' . $subkriteriaPenilaian->id,
                'nama_subkriteria_penilaian' => 'required',
                'bobot_subkriteria_penilaian' => 'required'
            ],
            [
                'kriteria_penilaian.required' => 'Field Kriteria Penilaian Wajib Diisi',
                'kode_subkriteria_penilaian.required' => 'Field Kode Subkriteria Penilaian Wajib Diisi',
                'kode_subkriteria_penilaian.unique' => 'Kode Subkriteria Penilaian ' . $request->get('kode_subkriteria_penilaian') . ' Sudah Ada',
                'nama_subkriteria_penilaian.required' => 'Field Nama Subkriteria Penilaian Wajib Diisi',
                'bobot_subkriteria_penilaian.required' => 'Field Bobot Subkriteria Penilaian Wajib Diisi'
            ]
        );

        $subkriteriaPenilaian->id_kriteria_penilaian = $validateRequest['kriteria_penilaian'];
        $subkriteriaPenilaian->kode_subkriteria_penilaian = $validateRequest['kode_subkriteria_penilaian'];
        $subkriteriaPenilaian->nama_subkriteria_penilaian = $validateRequest['nama_subkriteria_penilaian'];
        $subkriteriaPenilaian->bobot_subkriteria_penilaian = $validateRequest['bobot_subkriteria_penilaian'];
        $subkriteriaPenilaian->save();

        return redirect()->to('subkriteria-penilaian')->with('successMessage', 'Berhasil mengubah subkriteria penilaian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubkriteriaPenilaian  $subkriteriaPenilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubkriteriaPenilaian $subkriteriaPenilaian)
    {
        $subkriteriaPenilaian->delete();
        return redirect()->to('subkriteria-penilaian')->with('successMessage', 'Berhasil menghapus subkriteria penilaian');
    }
}
