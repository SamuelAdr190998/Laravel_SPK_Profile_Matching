@extends('guest.layouts.main')

@section('content-wrapper')
    <div class="card-body container py-5">
        <h3 class="text-center text-white fw-bold mb-5">Hasil Rekomendasi</h3>
        <div class="card">
            <div class="card-header bg-white text-info fw-bold">
                Laman Hasil Rekomendasi
            </div>
            <div class="card-body bg-info">
                <table class="table table-bordered" id="dataTables">
                    <thead class="text-center align-middle bg-white text-info">
                        <tr>
                            <th>No.</th>
                            <th>Nama Kos</th>
                            <th>Nama Pemilik</th>
                            <th>Jenis Kos</th>
                            <th>Alamat Kos</th>
                            <th>Whatsapp Kos</th>
                        </tr>
                    </thead>
                    <tbody class="text-center align-middle bg-secondary text-white">
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($hasilRekomendasi as $rekom)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $rekom['nama_kos'] }}</td>
                                <td>{{ $rekom['pemilik_kos'] }}</td>
                                <td>{{ $rekom['jenis_kos'] }}</td>
                                <td>{{ $rekom['alamat_kos'] }}</td>
                                <td>{{ $rekom['whatsapp_kos'] }}</td>
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
