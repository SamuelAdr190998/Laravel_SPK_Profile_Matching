<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AspekPenilaian;
use Illuminate\Http\Request;

class AspekPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = [
            'titlePage' => 'Aspek Penilaian',
            'dataAspekPenilaian' => AspekPenilaian::all()
        ];

        return view('admin.pages.aspek-penilaian.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = [
            'titlePage' => 'Tambah Aspek Penilaian'
        ];

        return view('admin.pages.aspek-penilaian.create', $datas);
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
                'kode_aspek_penilaian' => 'required',
                'nama_aspek_penilaian' => 'required'
            ],
            [
                'kode_aspek_penilaian.required' => 'Field Kode Aspek Penilaian Wajib Diisi',
                'nama_aspek_penilaian.required' => 'Field Nama Aspek Penilaian Wajib Diisi'
            ]
        );

        $NewAspekPenilaian = new AspekPenilaian();
        $NewAspekPenilaian->kode_aspek_penilaian = $validateRequest['kode_aspek_penilaian'];
        $NewAspekPenilaian->nama_aspek_penilaian = $validateRequest['nama_aspek_penilaian'];
        $NewAspekPenilaian->save();

        return redirect()->to('aspek-penilaian')->with('successMessage', 'Berhasil menambahkan aspek penilaian.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AspekPenilaian  $aspekPenilaian
     * @return \Illuminate\Http\Response
     */
    public function show(AspekPenilaian $aspekPenilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AspekPenilaian  $aspekPenilaian
     * @return \Illuminate\Http\Response
     */
    public function edit(AspekPenilaian $aspekPenilaian)
    {
        $datas = [
            'titlePage' => 'Ubah Aspek Penilaian',
            'dataAspekPenilaian' => $aspekPenilaian
        ];

        return view('admin.pages.aspek-penilaian.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AspekPenilaian  $aspekPenilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AspekPenilaian $aspekPenilaian)
    {
        $validateRequest = $request->validate(
            [
                'kode_aspek_penilaian' => 'required|unique:aspek_penilaian,kode_aspek_penilaian,' . $aspekPenilaian->id,
                'nama_aspek_penilaian' => 'required'
            ],
            [
                'kode_aspek_penilaian.required' => 'Field Kode Aspek Penilaian Wajib Diisi',
                'kode_aspek_penilaian.unique' => 'Kode Aspek Penilaian ' . $request->get('kode_aspek_penilaian') . ' Sudah Ada',
                'nama_aspek_penilaian.required' => 'Field Nama Aspek Penilaian Wajib Diisi'
            ]
        );

        $aspekPenilaian->kode_aspek_penilaian = $validateRequest['kode_aspek_penilaian'];
        $aspekPenilaian->nama_aspek_penilaian = $validateRequest['nama_aspek_penilaian'];
        $aspekPenilaian->save();

        return redirect()->to('aspek-penilaian')->with('successMessage', 'Berhasil mengubah aspek penilaian.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AspekPenilaian  $aspekPenilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(AspekPenilaian $aspekPenilaian)
    {
        $aspekPenilaian->delete();
        return redirect()->to('aspek-penilaian')->with('successMessage', 'Berhasil menghapus aspek penilaian.');
    }
}
