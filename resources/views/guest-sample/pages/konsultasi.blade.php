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
                    {{-- @php
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
                    </div> --}}
                @else
                    <form action="{{ URL::to('konsultasi') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label text-white">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
                            @error('nama_lengkap')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="jenis_kos" class="form-label text-white">Jenis Kos</label>
                            <select class="form-select @error('jenis_kos') is-invalid @enderror" name="jenis_kos"
                                id="jenis_kos">
                                <option disabled selected>Pilih Jenis Kos...</option>
                                @foreach ($jenisKos as $key => $value)
                                    @if (old('jenis_kos') == $key)
                                        <option value="{{ $key }}" selected>{{ $key }}</option>
                                    @else
                                        <option value="{{ $key }}">{{ $key }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('jenis_kos')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            @error('checkbox-user')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            @foreach ($kriteriaPenilaian as $item)
                                <div class="mb-3">
                                    <label for="{{ 'label-' . $item->kode_kriteria }}"
                                        class="text-white mb-3 fw-bold">{{ $item->nama_kriteria }}</label>
                                    @php
                                        $x = 0;
                                    @endphp
                                    @foreach ($subkriteriaPenilaian as $skp)
                                        @if ($item->id == $skp->id_kriteria)
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input @error('checkbox-user.' . $item->kode_kriteria) is-invalid @enderror"
                                                    type="checkbox" name="checkbox-user[{{ $item->kode_kriteria }}][]"
                                                    value="{{ $skp->kode_sub_kriteria }}"
                                                    @if (is_array(old('checkbox-user.' . $item->kode_kriteria)) &&
                                                        in_array($skp->kode_sub_kriteria, old('checkbox-user.' . $item->kode_kriteria))) checked @endif>
                                                <label class="form-check-label text-white" for="flexCheckDefault">
                                                    {{ $skp->nama_sub_kriteria }}
                                                </label>
                                                @error('checkbox-user.' . $item->kode_kriteria)
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            @php
                                                $x++;
                                            @endphp
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
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
