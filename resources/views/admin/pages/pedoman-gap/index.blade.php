@extends('admin.layouts.main')

@section('content-wrapper')
    <div class="container-fluid px-4">
        <h1 class="mt-4">
            <i class="fa-solid fa-book-open me-1"></i>
            Pedoman GAP
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pedoman GAP</li>
        </ol>
        <div class="card">
            <style>
                .dataTables_filter {
                    margin-bottom: .5em;
                }
            </style>
            <div class="card-header bg-info text-white fw-bold">
                <i class="fas fa-info-circle me-1"></i>
                Informasi Pedoman GAP
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="dataTable" style="width: 100%;">
                    <thead class="bg-info text-white">
                        <tr>
                            <th class="text-center align-middle">No.</th>
                            <th class="text-center align-middle">Ketentuan Selisih</th>
                            <th class="text-center align-middle">Bobot Nilai</th>
                            <th class="text-center align-middle">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($pedomangap as $item)
                            <tr>
                                <td class="text-center align-middle">{{ $i }}</td>
                                <td class="text-center align-middle">
                                    {{ $item->ketentuan_selisih }}
                                </td>
                                <td class="text-center align-middle">
                                    {{ $item->bobot_nilai }}
                                </td>
                                <td class="text-center align-middle">{{ $item->keterangan }}</td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
