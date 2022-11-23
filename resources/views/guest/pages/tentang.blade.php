@extends('guest.layouts.main')

@section('content-wrapper')
<div class="card-body bg-white" id="card-body-wrapper">
    <h2 class="text-center fw-bold mb-5 mt-3">Tentang</h2>
    <div class="container py-5">
        <p>Sistem ini dirancang untuk membantu para pencari kos yang ingin mengekos dengan radius < 5KM dari Universitas Sumatera Utara sesuai dengan kriteria kos yang diinginkan.</p>
        <div class="text-center">
            <img src="{{ URL::to('library/simpletemp/img/logousu.png') }}" alt="Image" width="200px" height="200px" class="img-fluid mb-5"/>
            <h4 class="fw-bold">SISTEM PENDUKUNG PENGAMBILAN KEPUTUSAN REKOMENDASI RUMAH KOS DENGAN MENGGUNAKAN METODE MULTI ATTRBUTE UTILITY THEORY (MAUT) BERBASIS WEB</h4>
            <p>SINTHA SINTYA RANI - 171401011</p>
        </div>
    </div>
</div>
@endsection
