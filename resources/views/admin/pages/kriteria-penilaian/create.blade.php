@extends('admin.layouts.main')

@section('content-wrapper')
    <div class="container-fluid px-4">
        <h1 class="mt-4">
            <i class="fas fa-list me-1"></i>
            Kriteria Penilaian
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Kriteria Penilaian</li>
        </ol>
        <div class="card">
            <div class="card-header bg-info text-white fw-bold">
                <i class="fas fa-plus-circle me-1"></i>
                Tambah Kriteria Penilaian
            </div>
            <div class="card-body">
                <form action="{{ URL::to('kriteria-penilaian') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="aspek_penilaian" class="form-label">Aspek Penilaian</label>
                        <select class="form-select @error('aspek_penilaian') is-invalid @enderror" name="aspek_penilaian"
                            id="aspek_penilaian">
                            <option disabled selected>Pilih salah satu...</option>
                            @foreach ($aspekPenilaian as $item)
                                @if (old('aspek_penilaian') == $item->id)
                                    <option value="{{ $item->id }}" selected>
                                        {{ $item->kode_aspek_penilaian }} - {{ $item->nama_aspek_penilaian }}
                                    </option>
                                @else
                                    <option value="{{ $item->id }}">
                                        {{ $item->kode_aspek_penilaian }} - {{ $item->nama_aspek_penilaian }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('aspek_penilaian')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kode_kriteria_penilaian" class="form-label">Kode Kriteria Penilaian</label>
                        <input type="text" class="form-control @error('kode_kriteria_penilaian') is-invalid @enderror"
                            name="kode_kriteria_penilaian" id="kode_kriteria_penilaian"
                            value="{{ old('kode_kriteria_penilaian') }}">
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
                            value="{{ old('nama_kriteria_penilaian') }}">
                        @error('nama_kriteria_penilaian')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="bobot_kriteria_penilaian" class="form-label">Bobot Kriteria Penilaian</label>
                        <input type="number" class="form-control @error('bobot_kriteria_penilaian') is-invalid @enderror"
                            name="bobot_kriteria_penilaian" id="bobot_kriteria_penilaian"
                            value="{{ old('bobot_kriteria_penilaian') }}">
                        @error('bobot_kriteria_penilaian')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status_kriteria_penilaian" class="form-label">Status Kriteria Penilaian</label>
                        @php
                            $selectList = ['Faktor Utama', 'Faktor Pendukung'];
                        @endphp
                        <select class="form-select @error('status_kriteria_penilaian') is-invalid @enderror"
                            name="status_kriteria_penilaian" id="status_kriteria_penilaian">
                            <option disabled selected>Pilih salah satu...</option>
                            @foreach ($selectList as $item)
                                @if (old('status_kriteria_penilaian') == $item)
                                    <option value="{{ $item }}" selected>{{ $item }}</option>
                                @else
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('status_kriteria_penilaian')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="persentase_kriteria_penilaian" class="form-label">Persentase Kriteria Penilaian</label>
                        <input type="number"
                            class="form-control @error('persentase_kriteria_penilaian') is-invalid @enderror"
                            name="persentase_kriteria_penilaian" id="persentase_kriteria_penilaian"
                            value="{{ old('persentase_kriteria_penilaian') }}">
                        @error('persentase_kriteria_penilaian')
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
