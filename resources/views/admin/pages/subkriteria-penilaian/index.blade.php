@extends('admin.layouts.main')

@section('content-wrapper')
    <div class="container-fluid px-4">
        <h1 class="mt-4">
            <i class="fa-solid fa-folder-tree me-1"></i>
            Subkriteria Penilaian
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Subkriteria Penilaian</li>
        </ol>
        <div class="card">
            <style>
                .dataTables_filter {
                    margin-bottom: .5em;
                }
            </style>
            <div class="card-header bg-info text-white fw-bold">
                <i class="fas fa-info-circle me-1"></i>
                Informasi Subkriteria Penilaian
            </div>
            <div class="card-body">
                @if (session()->has('successMessage'))
                    <div class="alert alert-info" role="alert">
                        {{ session('successMessage') }}
                    </div>
                @endif
                <a href="{{ URL::to('subkriteria-penilaian/create') }}" class="btn btn-info text-white fw-bold mb-3">
                    <i class="fas fa-plus-circle me-1"></i>
                    Tambah Data
                </a>
                <table class="table table-bordered table-striped" id="dataTable" style="width: 100%;">
                    <thead class="bg-info text-white">
                        <tr>
                            <th class="text-center align-middle">No.</th>
                            <th class="text-center align-middle">Aspek Penilaian</th>
                            <th class="text-center align-middle">Kriteria Penilaian</th>
                            <th class="text-center align-middle">Kode Subkriteria Penilaian</th>
                            <th class="text-center align-middle">Nama Subkriteria Penilaian</th>
                            <th class="text-center align-middle">Bobot Subkriteria Penilaian</th>
                            <th class="text-center align-middle"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($subkriteriaPenilaian as $item)
                            <tr>
                                <td class="text-center align-middle">{{ $i }}</td>
                                <td class="text-center align-middle">
                                    {{ $item->kriteriapenilaian->aspekpenilaian->nama_aspek_penilaian }}
                                </td>
                                <td class="text-center align-middle">
                                    {{ $item->kriteriapenilaian->nama_kriteria_penilaian }}
                                </td>
                                <td class="text-center align-middle">{{ $item->kode_subkriteria_penilaian }}</td>
                                <td class="text-center align-middle">{{ $item->nama_subkriteria_penilaian }}</td>
                                <td class="text-center align-middle">{{ $item->bobot_subkriteria_penilaian }}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ URL::to('subkriteria-penilaian/' . $item->id . '/edit') }}"
                                        class="btn btn-warning text-white">
                                        <i class="fas fa-edit me-1"></i>
                                        Ubah Data
                                    </a>
                                    <form action="{{ URL::to('subkriteria-penilaian/' . $item->id) }}" method="POST"
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
