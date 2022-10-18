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
            <style>
                .dataTables_filter {
                    margin-bottom: .5em;
                }
            </style>
            <div class="card-header bg-info text-white fw-bold">
                <i class="fas fa-info-circle me-1"></i>
                Informasi Data Penilaian
            </div>
            <div class="card-body">
                @if (session()->has('successMessage'))
                    <div class="alert alert-info" role="alert">
                        {{ session('successMessage') }}
                    </div>
                @endif
                <a href="{{ URL::to('data-penilaian/create') }}" class="btn btn-info text-white fw-bold mb-3">
                    <i class="fas fa-plus-circle me-1"></i>
                    Tambah Data
                </a>

                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($dataAlternatif as $item)
                            @if ($i == 1)
                                <button class="nav-link active" id="nav-{{ $item->kode_alternatif }}-tab"
                                    data-bs-toggle="tab" data-bs-target="#nav-{{ $item->kode_alternatif }}" type="button"
                                    role="tab" aria-controls="nav-{{ $item->kode_alternatif }}"
                                    aria-selected="true">{{ $item->nama_alternatif }}</button>
                            @else
                                <button class="nav-link" id="nav-{{ $item->kode_alternatif }}-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-{{ $item->kode_alternatif }}" type="button" role="tab"
                                    aria-controls="nav-{{ $item->kode_alternatif }}"
                                    aria-selected="true">{{ $item->nama_alternatif }}</button>
                            @endif
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($dataAlternatif as $item)
                        @if ($i == 1)
                            <div class="tab-pane fade show active" id="nav-{{ $item->kode_alternatif }}" role="tabpanel"
                                aria-labelledby="nav-{{ $item->kode_alternatif }}-tab" tabindex="0">
                                <table class="table table-bordered table-striped"
                                    id="dataTable-{{ $item->kode_alternatif }}" style="width: 100%;">
                                    <thead class="bg-info text-white">
                                        <tr>
                                            <th class="text-center align-middle">No.</th>
                                            <th class="text-center align-middle">Aspek Penilaian</th>
                                            <th class="text-center align-middle">Kriteria Penilaian</th>
                                            <th class="text-center align-middle">Penilaian</th>
                                            <th class="text-center align-middle"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($dataPenilaian as $penilaian)
                                            @if ($item->kode_alternatif == $penilaian->alternatif->kode_alternatif)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $i }}</td>
                                                    <td class="text-center align-middle">
                                                        {{ $penilaian->aspekpenilaian->nama_aspek_penilaian }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ $penilaian->kriteriapenilaian->nama_kriteria_penilaian }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ $penilaian->subkriteriapenilaian->nama_subkriteria_penilaian }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <a href="{{ URL::to('data-penilaian/' . $penilaian->id . '/edit') }}"
                                                            class="btn btn-warning text-white">
                                                            <i class="fas fa-edit me-1"></i>
                                                            Ubah Data
                                                        </a>
                                                        <form action="{{ URL::to('data-penilaian/' . $penilaian->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger">
                                                                <i class="fas fa-trash me-1"></i>
                                                                Hapus Data
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="tab-pane fade" id="nav-{{ $item->kode_alternatif }}" role="tabpanel"
                                aria-labelledby="nav-{{ $item->kode_alternatif }}-tab" tabindex="0">
                                <table class="table table-bordered table-striped"
                                    id="dataTable-{{ $item->kode_alternatif }}" style="width: 100%;">
                                    <thead class="bg-info text-white">
                                        <tr>
                                            <th class="text-center align-middle">No.</th>
                                            <th class="text-center align-middle">Aspek Penilaian</th>
                                            <th class="text-center align-middle">Kriteria Penilaian</th>
                                            <th class="text-center align-middle">Subkriteria Penilaian</th>
                                            <th class="text-center align-middle"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($dataPenilaian as $penilaian)
                                            @if ($item->kode_alternatif == $penilaian->alternatif->kode_alternatif)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $i }}</td>
                                                    <td class="text-center align-middle">
                                                        {{ $penilaian->aspekpenilaian->nama_aspek_penilaian }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ $penilaian->kriteriapenilaian->nama_kriteria_penilaian }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ $penilaian->subkriteriapenilaian->nama_subkriteria_penilaian }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <a href="{{ URL::to('data-penilaian/' . $penilaian->id . '/edit') }}"
                                                            class="btn btn-warning text-white">
                                                            <i class="fas fa-edit me-1"></i>
                                                            Ubah Data
                                                        </a>
                                                        <form action="{{ URL::to('data-penilaian/' . $penilaian->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger">
                                                                <i class="fas fa-trash me-1"></i>
                                                                Hapus Data
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('addOnsJS')
    <script>
        $(document).ready(() => {
            var fetchDataAlternatif = {!! json_encode($dataAlternatif) !!};
            fetchDataAlternatif.forEach(element => {
                $(`#dataTable-${element.kode_alternatif}`).DataTable({
                    rowReorder: {
                        selector: 'td:nth-child(2)'
                    },
                    responsive: true
                });
            });
        });
    </script>
@endsection
