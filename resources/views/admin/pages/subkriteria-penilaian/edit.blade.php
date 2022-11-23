@extends('admin.layouts.main')

@section('content-wrapper')
    <div class="container-fluid px-4">
        <h1 class="mt-4">
            <i class="fa-solid fa-folder-tree me-1"></i>
            Subkriteria Penilaian
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Subkriteria Penilaian</li>
        </ol>
        <div class="card">
            <div class="card-header bg-info text-white fw-bold">
                <i class="fas fa-edit me-1"></i>
                Ubah Kriteria Penilaian
            </div>
            <div class="card-body">
                <form action="{{ URL::to('data-subkriteria/' . $subkriteriaPenilaian->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="kriteria_penilaian" class="form-label">Kriteria Penilaian</label>
                        <select class="form-select @error('kriteria_penilaian') is-invalid @enderror"
                            name="kriteria_penilaian" id="kriteria_penilaian">
                            <option disabled selected>Pilih salah satu...</option>
                            @foreach ($kriteriaPenilaian as $item)
                                @if (old('kriteria_penilaian', $subkriteriaPenilaian->id_kriteria) == $item->id)
                                    <option value="{{ $item->id }}" selected>
                                        {{ $item->kode_kriteria }} - {{ $item->nama_kriteria }}
                                    </option>
                                @else
                                    <option value="{{ $item->id }}">
                                        {{ $item->kode_kriteria }} - {{ $item->nama_kriteria }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('kriteria_penilaian')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kode_subkriteria_penilaian" class="form-label">Kode Subkriteria Penilaian</label>
                        <input type="text" class="form-control @error('kode_subkriteria_penilaian') is-invalid @enderror"
                            name="kode_subkriteria_penilaian" id="kode_subkriteria_penilaian"
                            value="{{ old('kode_subkriteria_penilaian', $subkriteriaPenilaian->kode_sub_kriteria) }}">
                        @error('kode_subkriteria_penilaian')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_subkriteria_penilaian" class="form-label">Nama Subkriteria Penilaian</label>
                        <input type="text" class="form-control @error('nama_subkriteria_penilaian') is-invalid @enderror"
                            name="nama_subkriteria_penilaian" id="nama_subkriteria_penilaian"
                            value="{{ old('nama_subkriteria_penilaian', $subkriteriaPenilaian->nama_sub_kriteria) }}">
                        @error('nama_subkriteria_penilaian')
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
