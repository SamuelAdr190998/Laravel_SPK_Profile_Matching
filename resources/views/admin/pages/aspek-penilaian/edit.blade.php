@extends('admin.layouts.main')

@section('content-wrapper')
    <div class="container-fluid px-4">
        <h1 class="mt-4">
            <i class="fas fa-clipboard-list me-1"></i>
            Aspek Penilaian
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Aspek Penilaian</li>
        </ol>
        <div class="card">
            <div class="card-header bg-info text-white fw-bold">
                <i class="fas fa-edit me-1"></i>
                Ubah Aspek Penilaian
            </div>
            <div class="card-body">
                <form action="{{ URL::to('aspek-penilaian/' . $dataAspekPenilaian->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="kode_aspek_penilaian" class="form-label">Kode Aspek Penilaian</label>
                        <input type="text" class="form-control @error('kode_aspek_penilaian') is-invalid @enderror"
                            name="kode_aspek_penilaian" id="kode_aspek_penilaian"
                            value="{{ old('kode_aspek_penilaian', $dataAspekPenilaian->kode_aspek_penilaian) }}">
                        @error('kode_aspek_penilaian')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_aspek_penilaian" class="form-label">Nama Aspek Penilaian</label>
                        <input type="text" class="form-control @error('nama_aspek_penilaian') is-invalid @enderror"
                            name="nama_aspek_penilaian" id="nama_aspek_penilaian"
                            value="{{ old('nama_aspek_penilaian', $dataAspekPenilaian->nama_aspek_penilaian) }}">
                        @error('nama_aspek_penilaian')
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
