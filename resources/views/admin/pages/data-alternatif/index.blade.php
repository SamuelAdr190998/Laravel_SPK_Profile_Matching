@extends('admin.layouts.main')

@section('content-wrapper')
    <div class="container-fluid px-4">
        <h1 class="mt-4">
            <i class="fas fa-list me-1"></i>
            Data Alternatif
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Alternatif</li>
        </ol>
        <div class="card">
            <style>
                .dataTables_filter {
                    margin-bottom: .5em;
                }
            </style>
            <div class="card-header bg-info text-white fw-bold">
                <i class="fas fa-info-circle me-1"></i>
                Informasi Data Alternatif
            </div>
            <div class="card-body">
                @if (session()->has('successMessage'))
                    <div class="alert alert-info" role="alert">
                        {{ session('successMessage') }}
                    </div>
                @endif
                <a href="{{ URL::to('data-alternatif/create') }}" class="btn btn-info text-white fw-bold mb-3">
                    <i class="fas fa-plus-circle me-1"></i>
                    Tambah Data
                </a>
                <table class="table table-bordered table-striped" id="dataTable" style="width: 100%;">
                    <thead class="bg-info text-white">
                        <tr>
                            <th class="text-center align-middle">No.</th>
                            <th class="text-center align-middle">Kode Alternatif</th>
                            <th class="text-center align-middle">Nama Alternatif</th>
                            <th class="text-center align-middle"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($dataAlternatif as $item)
                            <tr>
                                <td class="text-center align-middle">{{ $i }}</td>
                                <td class="text-center align-middle">{{ $item->kode_alternatif }}</td>
                                <td class="text-center align-middle">{{ $item->nama_alternatif }}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ URL::to('data-alternatif/' . $item->id . '/edit') }}"
                                        class="btn btn-warning text-white">
                                        <i class="fas fa-edit me-1"></i>
                                        Ubah Data
                                    </a>
                                    <form action="{{ URL::to('data-alternatif/' . $item->id) }}" method="POST"
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
