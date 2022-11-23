@extends('admin.layouts.main')

@section('content-wrapper')
    <div class="container-fluid px-4">
        <h1 class="mt-4">
            <i class="fas fa-poll-h me-1"></i>
            Hasil Penilaian
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Hasil Penilaian</li>
        </ol>
        <div class="card">
            <style>
                .dataTables_filter {
                    margin-bottom: .5em;
                }
            </style>
            <div class="card-header bg-info text-white fw-bold">
                <i class="fas fa-info-circle me-1"></i>
                Informasi Hasil Penilaian
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="dataTable" style="width: 100%;">
                    <thead class="bg-info text-white">
                        <tr>
                            <th class="text-center align-middle">No.</th>
                            <th class="text-center align-middle">Kode Alternatif</th>
                            <th class="text-center align-middle">Nama Kos</th>
                            <th class="text-center align-middle">Link Kos</th>
                            <th class="text-center align-middle">Pemilik Kos</th>
                            <th class="text-center align-middle">Jenis Kos</th>
                            <th class="text-center align-middle">Alamat Kos</th>
                            <th class="text-center align-middle">Whatsapp Kos</th>
                            <th class="text-center align-middle">Nilai Kos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($hasilPenilaian as $item)
                            <tr>
                                <td class="text-center align-middle">{{ $i }}</td>
                                <td class="text-center align-middle">{{ $item['kode_alternatif'] }}</td>
                                <td class="text-center align-middle">{{ $item['nama_kos'] }}</td>
                                <td class="text-center align-middle">{{ $item['link_kos'] }}</td>
                                <td class="text-center align-middle">{{ $item['pemilik_kos'] }}</td>
                                <td class="text-center align-middle">{{ $item['jenis_kos'] }}</td>
                                <td class="text-center align-middle" style="text-align: justify;">
                                    {{ $item['alamat_kos'] }}
                                </td>
                                <td class="text-center align-middle">{{ $item['whatsapp_kos'] }}</td>
                                <td class="text-center align-middle">{{ $item['nilai_kos'] }}</td>
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
