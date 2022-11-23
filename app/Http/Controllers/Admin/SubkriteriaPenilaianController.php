<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataSubKriteria;
use App\Models\DataKriteria;
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
            'subkriteriaPenilaian' => DataSubKriteria::all()
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
            'kriteriaPenilaian' => DataKriteria::all()
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
                'kode_subkriteria_penilaian' => 'required|unique:data_sub_kriteria,kode_sub_kriteria',
                'nama_subkriteria_penilaian' => 'required'
            ],
            [
                'kriteria_penilaian.required' => 'Field Kriteria Penilaian Wajib Diisi',
                'kode_subkriteria_penilaian.required' => 'Field Kode Subkriteria Penilaian Wajib Diisi',
                'kode_subkriteria_penilaian.unique' => 'Kode Subkriteria Penilaian ' . $request->get('kode_subkriteria_penilaian') . ' Telah Ada',
                'nama_subkriteria_penilaian.required' => 'Field Nama Subkriteria Penilaian Wajib Diisi'
            ]
        );

        $NewSubkriteriaPenilaian = new DataSubKriteria();
        $NewSubkriteriaPenilaian->id_kriteria = $validateRequest['kriteria_penilaian'];
        $NewSubkriteriaPenilaian->kode_sub_kriteria = $validateRequest['kode_subkriteria_penilaian'];
        $NewSubkriteriaPenilaian->nama_sub_kriteria = $validateRequest['nama_subkriteria_penilaian'];
        $NewSubkriteriaPenilaian->save();

        return redirect()->to('data-subkriteria')->with('successMessage', 'Berhasil menambahkan subkriteria penilaian');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubkriteriaPenilaian  $subkriteriaPenilaian
     * @return \Illuminate\Http\Response
     */
    public function show(DataSubKriteria $subkriteriaPenilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubkriteriaPenilaian  $subkriteriaPenilaian
     * @return \Illuminate\Http\Response
     */
    public function edit(DataSubKriteria $subkriteriaPenilaian, $data_subkriteria)
    {
        $subkriteriaPenilaian = DataSubKriteria::find($data_subkriteria);

        $datas = [
            'titlePage' => 'Ubah Subkriteria Penilaian',
            'kriteriaPenilaian' => DataKriteria::all(),
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
    public function update(Request $request, DataSubKriteria $subkriteriaPenilaian, $data_subkriteria)
    {
        $subkriteriaPenilaian = DataSubKriteria::find($data_subkriteria);

        $validateRequest = $request->validate(
            [
                'kriteria_penilaian' => 'required',
                'kode_subkriteria_penilaian' => 'required|unique:data_sub_kriteria,kode_sub_kriteria,' . $subkriteriaPenilaian->id,
                'nama_subkriteria_penilaian' => 'required'
            ],
            [
                'kriteria_penilaian.required' => 'Field Kriteria Penilaian Wajib Diisi',
                'kode_subkriteria_penilaian.required' => 'Field Kode Subkriteria Penilaian Wajib Diisi',
                'kode_subkriteria_penilaian.unique' => 'Kode Subkriteria Penilaian ' . $request->get('kode_subkriteria_penilaian') . ' Sudah Ada',
                'nama_subkriteria_penilaian.required' => 'Field Nama Subkriteria Penilaian Wajib Diisi'
            ]
        );

        $subkriteriaPenilaian->id_kriteria = $validateRequest['kriteria_penilaian'];
        $subkriteriaPenilaian->kode_sub_kriteria = $validateRequest['kode_subkriteria_penilaian'];
        $subkriteriaPenilaian->nama_sub_kriteria = $validateRequest['nama_subkriteria_penilaian'];
        $subkriteriaPenilaian->save();

        return redirect()->to('data-subkriteria')->with('successMessage', 'Berhasil mengubah subkriteria penilaian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubkriteriaPenilaian  $subkriteriaPenilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataSubKriteria $subkriteriaPenilaian, $data_subkriteria)
    {
        $subkriteriaPenilaian = DataSubKriteria::find($data_subkriteria);
        $subkriteriaPenilaian->delete();
        return redirect()->to('data-subkriteria')->with('successMessage', 'Berhasil menghapus subkriteria penilaian');
    }
}
