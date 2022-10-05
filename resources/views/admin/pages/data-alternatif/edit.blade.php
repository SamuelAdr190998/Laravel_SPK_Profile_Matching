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
                <form action="{{ URL::to('data-alternatif/' . $dataAlternatif->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="kode_alternatif" class="form-label">Kode Alternatif</label>
                        <input type="text" class="form-control @error('kode_alternatif') is-invalid @enderror"
                            name="kode_alternatif" id="kode_alternatif"
                            value="{{ old('kode_alternatif', $dataAlternatif->kode_alternatif) }}">
                        @error('kode_alternatif')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_alternatif" class="form-label">Nama Alternatif</label>
                        <input type="text" class="form-control @error('nama_alternatif') is-invalid @enderror"
                            name="nama_alternatif" id="nama_alternatif"
                            value="{{ old('nama_alternatif', $dataAlternatif->nama_alternatif) }}">
                        @error('nama_alternatif')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
