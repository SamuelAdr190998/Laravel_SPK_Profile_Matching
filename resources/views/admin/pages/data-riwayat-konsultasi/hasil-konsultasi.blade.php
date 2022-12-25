@extends('admin.layouts.main')

@section('content-wrapper')
    <div class="container-fluid px-4">
        <h1 class="mt-4">
            <i class="fas fa-history me-1"></i>
            Hasil Riwayat Konsultasi
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Hasil Riwayat Konsultasi</li>
        </ol>
        <div class="card">
            <div class="card-body bg-white" id="card-body-wrapper">
                <h2 class="text-center fw-bold mb-5 mt-3">Hasil Kriteria Kos</h2>
                <p class="text-center h5 fw-bold">Nama Pengguna :</p>
                <p class="text-center h4">{{ $nama_user }}</p>
                <div class="container py-5">
                    @if (count($detailHasil) > 0)
                        @foreach ($detailHasil as $item)
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ $item['link_gambar'] != null ? URL::to($item['link_gambar']) : 'https://static.vecteezy.com/system/resources/previews/004/968/590/original/no-result-data-not-found-concept-illustration-flat-design-eps10-simple-and-modern-graphic-element-for-landing-page-empty-state-ui-infographic-etc-vector.jpg' }}"
                                            alt="" style="height: 100%; width: 100%;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title fw-normal">{{ $item['nama_kos'] }}</h5>
                                            <p class="card-text fw-bold">Jenis Kos : {{ $item['jenis_kos'] }}</p>
                                            <p class="card-text fw-bold">Alamat Kos : {{ $item['alamat_kos'] }}</p>
                                            <p class="card-text fw-bold">Whatsapp Kos : {{ $item['whatsapp_kos'] }}</p>
                                            <a href="{{ URL::to('data-riwayat-konsultasi/' . $item['id']) . '/detail' }}"
                                                class="btn btn-success">Lihat
                                                Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h3 class="text-danger fw-bold text-center">Data tidak ditemukan</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
