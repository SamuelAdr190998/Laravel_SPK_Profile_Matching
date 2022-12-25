@extends('admin.layouts.main')

@section('content-wrapper')
    <div class="container-fluid px-4">
        <h1 class="mt-4">
            <i class="fas fa-history me-1"></i>
            Data Riwayat Konsultasi
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Riwayat Konsultasi</li>
        </ol>
        <div class="card">
            <style>
                .dataTables_filter {
                    margin-bottom: .5em;
                }
            </style>
            <div class="card-header bg-info text-white fw-bold">
                <i class="fas fa-info-circle me-1"></i>
                Informasi Riwayat Konsultasi Pengguna
            </div>
            <div class="card-body">
                @if (session()->has('successMessage'))
                    <div class="alert alert-info" role="alert">
                        {{ session('successMessage') }}
                    </div>
                @endif
                <table class="table table-bordered table-striped" id="dataTable" style="width: 100%;">
                    <thead class="bg-info text-white">
                        <tr>
                            <th class="text-center align-middle">No.</th>
                            <th class="text-center align-middle">Nama Pengguna</th>
                            <th class="text-center align-middle">Hasil Rekomendasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($dataRiwayatKonsultasi as $item)
                            <tr>
                                <td class="text-center align-middle">{{ $i }}</td>
                                <td class="text-center align-middle">{{ $item->nama_user }}</td>
                                <td class="text-center align-middle">
                                    <a class="btn btn-primary" href="{{ URL::to('data-riwayat-konsultasi/' . $item->id) }}">
                                        <i class="fas fa-eye me-1"></i>
                                        Lihat Hasil Rekomendasi
                                    </a>
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
