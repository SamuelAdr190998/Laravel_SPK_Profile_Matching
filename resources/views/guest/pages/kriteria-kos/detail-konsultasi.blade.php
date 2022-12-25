@extends('guest.layouts.main')

@section('content-wrapper')
    <div class="card-body bg-white" id="card-body-wrapper">
        <h2 class="text-center fw-bold mb-5 mt-3">Detail Kos</h2>
        <div class="container pb-5">
            <div class="card-group">
                <div class="container text-center mb-5">
                    <img src="{{ $linkGambar['link_gambar_1'] != null ? URL::to($linkGambar['link_gambar_1']) : 'https://static.vecteezy.com/system/resources/previews/004/968/590/original/no-result-data-not-found-concept-illustration-flat-design-eps10-simple-and-modern-graphic-element-for-landing-page-empty-state-ui-infographic-etc-vector.jpg' }}"
                        class="card-img-top border" alt="..." style="max-height: 20em; max-width: 20em;">
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
