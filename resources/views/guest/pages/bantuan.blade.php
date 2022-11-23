@extends('guest.layouts.main')

@section('content-wrapper')
<div class="card-body bg-white" id="card-body-wrapper">
    <h2 class="text-center fw-bold mb-5 mt-3">Bantuan</h2>
    <div class="container py-5">
        <div class="row">
            <h2 class="col-12 text-center tm-section-title">Panduan Menggunakan Sistem</h2>
				<p class="col-12 text-center"> Klik tombol "Pilih Kriteria Kos" <br> <br> Isi form (pertanyaan sesuai dengan kriteria kos yang kamu inginkan. Setelah itu klik tombol "Hasil Rekomendasi Kos", lalu sistem akan memproses rekomendasi kos dengan menggunakan metode MAUT) <br> <br> Sistem akan menampilkan hasil rekomendasi kos berdasarkan dengan kriteria yang sudah kamu masukkan </p>
        </div>
    </div>
</div>
@endsection
