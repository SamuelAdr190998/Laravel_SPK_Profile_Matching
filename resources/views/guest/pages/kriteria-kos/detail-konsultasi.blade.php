@extends('guest.layouts.main')

@section('content-wrapper')
    <div class="card-body bg-white" id="card-body-wrapper">
        <h2 class="text-center fw-bold mb-5 mt-3">Detail Kriteria Kos</h2>
        <div class="container py-5">
            <div class="card-group mb-3">
                <div class="card">
                    <img src="https://awsimages.detik.net.id/community/media/visual/2020/08/25/kos-kosan-dekat-itb-jatinangor_169.jpeg?w=700&q=90"
                        class="card-img-top" alt="...">
                </div>
                <div class="card">
                    <img src="https://awsimages.detik.net.id/community/media/visual/2020/08/25/kos-kosan-dekat-itb-jatinangor_169.jpeg?w=700&q=90"
                        class="card-img-top" alt="...">
                </div>
                <div class="card">
                    <img src="https://awsimages.detik.net.id/community/media/visual/2020/08/25/kos-kosan-dekat-itb-jatinangor_169.jpeg?w=700&q=90"
                        class="card-img-top" alt="...">
                </div>
            </div>
            <div class="container-fluid">
                <h3>{{ $detailHasil['nama_kos'] }}</h3>
                <div class="row mb-5">
                    <div class="col-sm-1">
                        <i class="fa-solid fa-restroom me-1"></i>
                        {{ $detailHasil['jenis_kos'] }}
                    </div>
                    <div class="col-sm-6">
                        <i class="fa-solid fa-location-dot me-1"></i>
                        {{ $detailHasil['lokasi_kos'] }}
                    </div>
                </div>
                @foreach ($detailHasil['data_kriteria'] as $item)
                    <div class="mb-3">
                        <h5>{{ $item['nama_kriteria'] }}</h5>
                        @foreach ($item['list_kriteria'] as $listkrit)
                            <p class="p-0 m-0">{{ $listkrit }}</p>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
