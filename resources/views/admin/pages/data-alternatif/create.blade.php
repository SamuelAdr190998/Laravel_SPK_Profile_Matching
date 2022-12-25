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
            <div class="card-header bg-info text-white fw-bold">
                <i class="fas fa-plus-circle me-1"></i>
                Tambah Data Alternatif
            </div>
            <div class="card-body">
                <form action="{{ URL::to('data-alternatif') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="kode_alternatif" class="form-label">Kode Alternatif</label>
                        <input type="text" class="form-control @error('kode_alternatif') is-invalid @enderror"
                            name="kode_alternatif" id="kode_alternatif" value="{{ old('kode_alternatif') }}">
                        @error('kode_alternatif')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_kos" class="form-label">Nama Kos</label>
                        <input type="text" class="form-control @error('nama_kos') is-invalid @enderror" name="nama_kos"
                            id="nama_kos" value="{{ old('nama_kos') }}">
                        @error('nama_kos')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pemilik_kos" class="form-label">Pemilik Kos</label>
                        <input type="text" class="form-control @error('pemilik_kos') is-invalid @enderror"
                            name="pemilik_kos" id="pemilik_kos" value="{{ old('pemilik_kos') }}">
                        @error('pemilik_kos')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kos" class="form-label">Jenis Kos</label>
                        <input type="text" class="form-control @error('jenis_kos') is-invalid @enderror" name="jenis_kos"
                            id="jenis_kos" value="{{ old('jenis_kos') }}">
                        @error('jenis_kos')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat_kos" class="form-label">Alamat Kos</label>
                        <input type="text" class="form-control @error('alamat_kos') is-invalid @enderror"
                            name="alamat_kos" id="alamat_kos" value="{{ old('alamat_kos') }}">
                        @error('alamat_kos')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="whatsapp_kos" class="form-label">Whatsapp Kos</label>
                        <input type="text" class="form-control @error('whatsapp_kos') is-invalid @enderror"
                            name="whatsapp_kos" id="whatsapp_kos" value="{{ old('whatsapp_kos') }}">
                        @error('whatsapp_kos')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputFileKosPic_One" class="form-label">Gambar Kos</label>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputFileKosPic_One">Upload Gambar</label>
                            <input type="file" class="form-control @error('inputFileKosPic_One') is-invalid @enderror"
                                id="inputFileKosPic_One" name="inputFileKosPic_One">
                            @error('inputFileKosPic_One')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="text-end" style="width: 100%;">
                        <button type="reset" class="btn btn-secondary fw-bold text-white">
                            <i class="fas fa-ban me-1"></i>
                            Cancel Data
                        </button>
                        <button type="submit" class="btn btn-info fw-bold text-white">
                            <i class="fas fa-save me-1"></i>
                            Submit Data
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
