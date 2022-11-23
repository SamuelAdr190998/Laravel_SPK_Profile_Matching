@extends('guest.layouts.main')

@section('content-wrapper')
    <div class="card-body bg-white" id="card-body-wrapper">
        <h2 class="text-center fw-bold mb-5 mt-3">Hasil Kriteria Kos</h2>
        <div class="container py-5">
            @foreach ($hasilRekomendasi as $item)
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://awsimages.detik.net.id/community/media/visual/2020/08/25/kos-kosan-dekat-itb-jatinangor_169.jpeg?w=700&q=90"
                                alt="" style="height: 100%; width: 100%;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-normal">{{ $item['nama_kos'] }}</h5>
                                <p class="card-text fw-bold">Jenis Kos : {{ $item['jenis_kos'] }}</p>
                                <p class="card-text fw-bold">Alamat Kos : {{ $item['alamat_kos'] }}</p>
                                <p class="card-text fw-bold">Whatsapp Kos : {{ $item['whatsapp_kos'] }}</p>
                                <a href="{{ URL::to('kriteria-kos/' . $item['id']) }}" class="btn btn-success">Lihat
                                    Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
