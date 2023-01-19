<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataAlternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

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
                'pemilik_kos' => 'required',
                'jenis_kos' => 'required',
                'alamat_kos' => 'required',
                'whatsapp_kos' => 'required'
            ],
            [
                'kode_alternatif.required' => 'Field Kode Alternatif Wajib Diisi',
                'kode_alternatif.unique' => 'Kode Alternatif ' . $request->get('kode_alternatif') . ' Sudah Ada',
                'nama_kos.required' => 'Field Nama Kos Wajib Diisi',
                'pemilik_kos.required' => 'Field Pemilik Kos Wajib Diisi',
                'jenis_kos.required' => 'Field Jenis Kos Wajib Diisi',
                'alamat_kos.required' => 'Field Alamat Kos Wajib Diisi',
                'whatsapp_kos.required' => 'Field Whatsapp Kos Wajib Diisi'
            ]
        );

        if ($request->file('inputFileKosPic_One')) {
            $inputFileKosPic_One = $request->file('inputFileKosPic_One');
            $tujuan_upload = getcwd();
            $inputFileKosPic_One->move($tujuan_upload, $inputFileKosPic_One->getClientOriginalName());
            $urlSaved = env('APP_URL') . '/' . $inputFileKosPic_One->getClientOriginalName();
        }

        $newDataAlternatif = new DataAlternatif();
        $newDataAlternatif->kode_alternatif = $validateRequest['kode_alternatif'];
        $newDataAlternatif->nama_kos = $validateRequest['nama_kos'];
        $newDataAlternatif->pemilik_kos = $validateRequest['pemilik_kos'];
        $newDataAlternatif->jenis_kos = $validateRequest['jenis_kos'];
        $newDataAlternatif->alamat_kos = $validateRequest['alamat_kos'];
        $newDataAlternatif->whatsapp_kos = $validateRequest['whatsapp_kos'];
        $newDataAlternatif->link_gambar_kos_1 = $urlSaved;
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
                'pemilik_kos' => 'required',
                'jenis_kos' => 'required',
                'alamat_kos' => 'required',
                'whatsapp_kos' => 'required'
            ],
            [
                'kode_alternatif.required' => 'Field Kode Alternatif Wajib Diisi',
                'kode_alternatif.unique' => 'Kode Alternatif ' . $request->get('kode_alternatif') . ' Sudah Ada',
                'nama_kos.required' => 'Field Nama Kos Wajib Diisi',
                'pemilik_kos.required' => 'Field Pemilik Kos Wajib Diisi',
                'jenis_kos.required' => 'Field Jenis Kos Wajib Diisi',
                'alamat_kos.required' => 'Field Alamat Kos Wajib Diisi',
                'whatsapp_kos.required' => 'Field Whatsapp Kos Wajib Diisi'
            ]
        );

        $dataAlternatif->kode_alternatif = $validateRequest['kode_alternatif'];
        $dataAlternatif->nama_kos = $validateRequest['nama_kos'];
        $dataAlternatif->pemilik_kos = $validateRequest['pemilik_kos'];
        $dataAlternatif->jenis_kos = $validateRequest['jenis_kos'];
        $dataAlternatif->alamat_kos = $validateRequest['alamat_kos'];
        $dataAlternatif->whatsapp_kos = $validateRequest['whatsapp_kos'];

        if ($dataAlternatif->link_gambar_kos_1 != null) {
            $array = explode("/", $dataAlternatif->link_gambar_kos_1);
            end($array);
            $lastKey = key($array);
            $fileName = $array[$lastKey];
            unlink(getcwd() . '/' . $fileName);

            if ($request->file('inputFileKosPic_One')) {
                $inputFileKosPic_One = $request->file('inputFileKosPic_One');
                $tujuan_upload = getcwd();
                $inputFileKosPic_One->move($tujuan_upload, $inputFileKosPic_One->getClientOriginalName());
                $urlSaved = env('APP_URL') . '/' . $inputFileKosPic_One->getClientOriginalName();
                $dataAlternatif->link_gambar_kos_1 = $urlSaved;
            }
        } else {
            if ($request->file('inputFileKosPic_One')) {
                $inputFileKosPic_One = $request->file('inputFileKosPic_One');
                $tujuan_upload = getcwd();
                $inputFileKosPic_One->move($tujuan_upload, $inputFileKosPic_One->getClientOriginalName());
                $urlSaved = env('APP_URL') . '/' . $inputFileKosPic_One->getClientOriginalName();
                $dataAlternatif->link_gambar_kos_1 = $urlSaved;
            }
        }

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
        if ($dataAlternatif->link_gambar_kos_1 != null) {
            $array = explode("/", $dataAlternatif->link_gambar_kos_1);
            end($array);
            $lastKey = key($array);
            $fileName = $array[$lastKey];
            unlink(getcwd() . '/' . $fileName);
        }

        try {
            rmdir(public_path($dataAlternatif->kode_alternatif));
        } catch (\Throwable $th) {
            //throw $th;
        }

        $dataAlternatif->delete();
        return redirect()->to('data-alternatif')->with('successMessage', 'Berhasil menghapus data alternatif.');
    }
}
