@extends('admin.layouts.main')

@section('content-wrapper')
    <div class="container-fluid px-4">
        <h1 class="mt-4">
            <i class="fas fa-folder-open me-1"></i>
            Kriteria Penilaian
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Kriteria Penilaian</li>
        </ol>
        <div class="card">
            <div class="card-header bg-info text-white fw-bold">
                <i class="fas fa-edit me-1"></i>
                Ubah Kriteria Penilaian
            </div>
            <div class="card-body">
                <form action="{{ URL::to('data-kriteria/' . $kriteriaPenilaian->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="kode_kriteria_penilaian" class="form-label">Kode Kriteria Penilaian</label>
                        <input type="text" class="form-control @error('kode_kriteria_penilaian') is-invalid @enderror"
                            name="kode_kriteria_penilaian" id="kode_kriteria_penilaian"
                            value="{{ old('kode_kriteria_penilaian', $kriteriaPenilaian->kode_kriteria) }}">
                        @error('kode_kriteria_penilaian')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_kriteria_penilaian" class="form-label">Nama Kriteria Penilaian</label>
                        <input type="text" class="form-control @error('nama_kriteria_penilaian') is-invalid @enderror"
                            name="nama_kriteria_penilaian" id="nama_kriteria_penilaian"
                            value="{{ old('nama_kriteria_penilaian', $kriteriaPenilaian->nama_kriteria) }}">
                        @error('nama_kriteria_penilaian')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="bobot_kriteria_penilaian" class="form-label">Bobot Kriteria Penilaian</label>
                        <input type="text" class="form-control @error('bobot_kriteria_penilaian') is-invalid @enderror"
                            name="bobot_kriteria_penilaian" id="bobot_kriteria_penilaian"
                            value="{{ old('bobot_kriteria_penilaian', $kriteriaPenilaian->bobot_kriteria) }}">
                        @error('bobot_kriteria_penilaian')
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
