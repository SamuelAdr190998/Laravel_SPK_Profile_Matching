<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AspekPenilaian;
use App\Models\DataAlternatif;
use App\Models\DataKriteria;
use App\Models\DataPenilaian;
use App\Models\DataSubKriteria;
use App\Models\KriteriaPenilaian;
use App\Models\SubkriteriaPenilaian;
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
        $datas = [
            'titlePage' => 'Tambah Data Penilaian',
            'dataAlternatif' => DataAlternatif::all(),
            'kriteriaPenilaian' => DataKriteria::all(),
            'subkriteriaPenilaian' => DataSubKriteria::all()
        ];

        return view('admin.pages.data-penilaian.create', $datas);
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
                'data_alternatif' => 'required',
                'kriteria_penilaian' => 'required',
                'cboSubkriteria' => 'required'
            ],
            [
                'data_alternatif.required' => 'Field Data Alternatif Wajib Diisi',
                'kriteria_penilaian.required' => 'Field Kriteria Penilaian Wajib Diisi',
                'kriteria_penilaian.unique' => 'Kriteria Penilaian Telah Ada',
                'cboSubkriteria.accepted' => 'Field Subkriteria Penilaian Wajib Diisi'
            ]
        );

        $NewDataPenilaian = new DataPenilaian();
        $NewDataPenilaian->id_alternatif = $validateRequest['data_alternatif'];
        $NewDataPenilaian->id_kriteria = $validateRequest['kriteria_penilaian'];
        $NewDataPenilaian->kode_sub_kriteria_array = json_encode($validateRequest['cboSubkriteria']);
        $NewDataPenilaian->save();

        return redirect()->to('data-penilaian')->with('successMessage', 'Berhasil menambahkan data penilaian');
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
        $datas = [
            'titlePage' => 'Ubah Data Penilaian',
            'dataAlternatif' => DataAlternatif::all(),
            'kriteriaPenilaian' => DataKriteria::all(),
            'subkriteriaPenilaian' => DataSubKriteria::all(),
            'dataPenilaian' => $dataPenilaian
        ];

        return view('admin.pages.data-penilaian.edit', $datas);
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
        $validateRequest = $request->validate(
            [
                'data_alternatif' => 'required',
                'kriteria_penilaian' => 'required',
                'cboSubkriteria' => 'required'
            ],
            [
                'data_alternatif.required' => 'Field Data Alternatif Wajib Diisi',
                'kriteria_penilaian.required' => 'Field Kriteria Penilaian Wajib Diisi',
                'cboSubkriteria.accepted' => 'Field Subkriteria Penilaian Wajib Diisi'
            ]
        );

        $dataPenilaian->id_alternatif = $validateRequest['data_alternatif'];
        $dataPenilaian->id_kriteria = $validateRequest['kriteria_penilaian'];
        $dataPenilaian->kode_sub_kriteria_array = json_encode($validateRequest['cboSubkriteria']);
        $dataPenilaian->save();

        return redirect()->to('data-penilaian')->with('successMessage', 'Berhasil mengubah data penilaian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPenilaian  $dataPenilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPenilaian $dataPenilaian)
    {
        $dataPenilaian->delete();
        return redirect()->to('data-penilaian')->with('successMessage', 'Berhasil menghapus data penilaian');
    }
}
