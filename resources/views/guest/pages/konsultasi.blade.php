@extends('guest.layouts.main')

@section('content-wrapper')
    <div class="card-body container py-5">
        <h3 class="text-center text-white fw-bold mb-5">Konsultasi</h3>
        <div class="card">
            <div class="card-header bg-white text-info fw-bold">
                Laman Konsultasi
            </div>
            <div class="card-body bg-info">
                @if (session()->has('resultJSON'))
                    @php
                        $result = session('resultJSON');
                    @endphp
                    <div class="mb-3">
                        <label for="nama_pasien" class="form-label text-white">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien"
                            value="{{ $result['Nama_Pasien'] }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label text-white">Jenis Kelamin</label>
                        <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror"
                            id="jenis_kelamin" name="jenis_kelamin" value="Perempuan" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="jenis_kelamin" class="form-label text-white">Kontrasepsi yang direkomendasikan</label>
                        <input type="text" class="form-control" value="{{ $result['Data_Hasil'] }}" readonly />
                    </div>
                @else
                    <form action="{{ URL::to('konsultasi') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_pasien" class="form-label text-white">Nama Pasien</label>
                            <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror"
                                id="nama_pasien" name="nama_pasien">
                            @error('nama_pasien')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="jenis_kelamin" class="form-label text-white">Jenis Kelamin</label>
                            <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                id="jenis_kelamin" name="jenis_kelamin" value="Perempuan" readonly>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @foreach ($aspekPenilaian as $aspek)
                            <input type="hidden" name="aspek_penilaian" value="{{ $aspek->id }}">
                            <div class="card mb-3">
                                <div class="card-header bg-white text-info fw-bold">Aspek Penilaian
                                    {{ $aspek->nama_aspek_penilaian }}</div>
                                <div class="card-body">
                                    @foreach ($kriteriaPenilaian as $kriteria)
                                        @if ($kriteria->id_aspek_penilaian == $aspek->id)
                                            <div class="mb-3">
                                                <label for="field_{{ $kriteria->kode_kriteria_penilaian }}"
                                                    class="form-label">{{ $kriteria->nama_kriteria_penilaian }}</label>
                                                <select
                                                    class="form-select @error('field_' . $kriteria->kode_kriteria_penilaian) is-invalid @enderror"
                                                    id="field_{{ $kriteria->kode_kriteria_penilaian }}"
                                                    name="field_{{ $kriteria->kode_kriteria_penilaian }}">
                                                    <option disabled selected>Pilih salah satu...</option>
                                                    @foreach ($subkriteriaPenilaian as $subkriteria)
                                                        @if ($subkriteria->id_kriteria_penilaian == $kriteria->id)
                                                            @if (old('field_' . $kriteria->kode_kriteria_penilaian) == $subkriteria->id)
                                                                <option value="{{ $subkriteria->id }}" selected>
                                                                    {{ $subkriteria->nama_subkriteria_penilaian }}</option>
                                                            @else
                                                                <option value="{{ $subkriteria->id }}">
                                                                    {{ $subkriteria->nama_subkriteria_penilaian }}</option>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('field_' . $kriteria->kode_kriteria_penilaian)
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        <div class="align-end">
                            <button class="btn btn-secondary text-white fw-bold" type="reset">Cancel Data</button>
                            <button class="btn btn-light text-info fw-bold" type="submit">Submit Data</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
