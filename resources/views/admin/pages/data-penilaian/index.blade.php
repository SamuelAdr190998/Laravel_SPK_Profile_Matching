@extends('admin.layouts.main')

@section('content-wrapper')
    <div class="container-fluid px-4">
        <h1 class="mt-4">
            <i class="fa-solid fa-paste me-1"></i>
            Data Penilaian
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Penilaian</li>
        </ol>
        <div class="card">
            <style>
                .dataTables_filter {
                    margin-bottom: .5em;
                }
            </style>
            <div class="card-header bg-info text-white fw-bold">
                <i class="fas fa-info-circle me-1"></i>
                Informasi Data Penilaian
            </div>
            <div class="card-body">
                @if (session()->has('successMessage'))
                    <div class="alert alert-info" role="alert">
                        {{ session('successMessage') }}
                    </div>
                @endif
                <a href="{{ URL::to('data-penilaian/create') }}" class="btn btn-info text-white fw-bold mb-3">
                    <i class="fas fa-plus-circle me-1"></i>
                    Tambah Data
                </a>
                <table class="table table-bordered table-striped" id="dataTable" style="width: 100%;">
                    <thead class="bg-info text-white">
                        <tr>
                            <th class="text-center align-middle">No.</th>
                            <th class="text-center align-middle">Nama Alternatif</th>
                            <th class="text-center align-middle">Kriteria Penilaian</th>
                            <th class="text-center align-middle">Penilaian</th>
                            <th class="text-center align-middle"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($dataPenilaian as $penilaian)
                            <tr>
                                <td class="text-center align-middle">{{ $i }}</td>
                                <td class="text-center align-middle">
                                    {{ $penilaian->alternatif->nama_kos }}
                                </td>
                                <td class="text-center align-middle">
                                    {{ $penilaian->kriteria->nama_kriteria }}
                                </td>
                                <td class="align-middle">
                                    <ul>
                                        @foreach (json_decode($penilaian->kode_sub_kriteria_array) as $item)
                                            <li style="text-align: justify;">
                                                {{ $penilaian->searchByKodeSubKriteria($item)->nama_sub_kriteria }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="text-center align-middle">
                                    <a href="{{ URL::to('data-penilaian/' . $penilaian->id . '/edit') }}"
                                        class="btn btn-warning text-white">
                                        <i class="fas fa-edit me-1"></i>
                                        Ubah Data
                                    </a>
                                    <form action="{{ URL::to('data-penilaian/' . $penilaian->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            <i class="fas fa-trash me-1"></i>
                                            Hapus Data
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
