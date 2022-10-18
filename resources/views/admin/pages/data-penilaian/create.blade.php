@extends('admin.layouts.main')

@section('content-wrapper')
    <div class="container-fluid px-4">
        <h1 class="mt-4">
            <i class="fa-solid fa-paste me-1"></i>
            Data Penilaian
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Penilaian</li>
        </ol>
        <div class="card">
            <div class="card-header bg-info text-white fw-bold">
                <i class="fas fa-plus-circle me-1"></i>
                Tambah Data Penilaian
            </div>
            <div class="card-body">
                <form action="{{ URL::to('data-penilaian') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="data_alternatif" class="form-label">Data Alternatif</label>
                        <select class="form-select @error('data_alternatif') is-invalid @enderror" name="data_alternatif"
                            id="data_alternatif">
                            <option disabled selected>Pilih salah satu...</option>
                            @foreach ($dataAlternatif as $item)
                                @if (old('data_alternatif') == $item->id)
                                    <option value="{{ $item->id }}" selected>
                                        {{ $item->kode_alternatif }} - {{ $item->nama_alternatif }}
                                    </option>
                                @else
                                    <option value="{{ $item->id }}">
                                        {{ $item->kode_alternatif }} - {{ $item->nama_alternatif }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('data_alternatif')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
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
                        <label for="kriteria_penilaian" class="form-label">Kriteria Penilaian</label>
                        <select class="form-select @error('kriteria_penilaian') is-invalid @enderror"
                            name="kriteria_penilaian" id="kriteria_penilaian">
                            <option disabled selected>Pilih salah satu...</option>
                            @foreach ($kriteriaPenilaian as $item)
                                @if (old('kriteria_penilaian') == $item->id)
                                    <option value="{{ $item->id }}" selected>
                                        {{ $item->kode_kriteria_penilaian }} - {{ $item->nama_kriteria_penilaian }}
                                    </option>
                                @else
                                    <option value="{{ $item->id }}">
                                        {{ $item->kode_kriteria_penilaian }} - {{ $item->nama_kriteria_penilaian }}
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
                    <div class="mb-3 d-none" id="field_subkriteria">
                        <label for="subkriteria_penilaian" class="form-label">Subkriteria Penilaian</label>
                        <select class="form-select @error('subkriteria_penilaian') is-invalid @enderror"
                            name="subkriteria_penilaian" id="subkriteria_penilaian">
                            <option disabled selected>Pilih salah satu...</option>
                        </select>
                        @error('subkriteria_penilaian')
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

@section('addOnsJS')
    <script>
        $(document).ready(() => {
            const fetchDataSubKriteria = {!! json_encode($subkriteriaPenilaian) !!};
            const oldDataSubKriteria = {!! json_encode(old('subkriteria_penilaian')) !!};

            if (oldDataSubKriteria) {
                var value = $('#kriteria_penilaian').val();
                fetchDataSubKriteria.forEach(element => {
                    $('#field_subkriteria').removeClass('d-none');
                    if (element.id_kriteria_penilaian == value) {
                        if (element.id == oldDataSubKriteria) {
                            $('#subkriteria_penilaian').append($('<option>', {
                                value: element.id,
                                text: element.kode_subkriteria_penilaian + ' - ' + element
                                    .nama_subkriteria_penilaian
                            }));
                            $(`#subkriteria_penilaian option[value='${oldDataSubKriteria}']`).attr(
                                "selected", "selected");
                        } else {
                            $('#subkriteria_penilaian').append($('<option>', {
                                value: element.id,
                                text: element.kode_subkriteria_penilaian + ' - ' + element
                                    .nama_subkriteria_penilaian
                            }));
                        }
                    }
                });
            }

            $('#kriteria_penilaian').on('change', () => {
                $('#field_subkriteria').removeClass('d-none');

                var value = $('#kriteria_penilaian').val();
                fetchDataSubKriteria.forEach(element => {
                    if (element.id_kriteria_penilaian == value) {
                        $('#subkriteria_penilaian').append($('<option>', {
                            value: element.id,
                            text: element.kode_subkriteria_penilaian + ' - ' + element
                                .nama_subkriteria_penilaian
                        }));
                    }
                });


            });
        });
    </script>
@endsection
