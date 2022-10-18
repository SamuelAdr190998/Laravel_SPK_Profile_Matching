<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubkriteriaPenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subkriteria_penilaian')->insert([
            [
                'id_kriteria_penilaian' => 1,
                'kode_subkriteria_penilaian' => 'SP1',
                'nama_subkriteria_penilaian' => '< 20 Tahun',
                'bobot_subkriteria_penilaian' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 1,
                'kode_subkriteria_penilaian' => 'SP2',
                'nama_subkriteria_penilaian' => '20 - 30 Tahun',
                'bobot_subkriteria_penilaian' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 1,
                'kode_subkriteria_penilaian' => 'SP3',
                'nama_subkriteria_penilaian' => '> 30 Tahun',
                'bobot_subkriteria_penilaian' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 2,
                'kode_subkriteria_penilaian' => 'SP4',
                'nama_subkriteria_penilaian' => 'Belum punya anak',
                'bobot_subkriteria_penilaian' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 2,
                'kode_subkriteria_penilaian' => 'SP5',
                'nama_subkriteria_penilaian' => '1 - 3 Orang',
                'bobot_subkriteria_penilaian' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 2,
                'kode_subkriteria_penilaian' => 'SP6',
                'nama_subkriteria_penilaian' => '> 3 Orang',
                'bobot_subkriteria_penilaian' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 3,
                'kode_subkriteria_penilaian' => 'SP7',
                'nama_subkriteria_penilaian' => '100 - 160 / 70 - 100 mmHg',
                'bobot_subkriteria_penilaian' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 3,
                'kode_subkriteria_penilaian' => 'SP8',
                'nama_subkriteria_penilaian' => '> 160/100 mmHg',
                'bobot_subkriteria_penilaian' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 4,
                'kode_subkriteria_penilaian' => 'SP9',
                'nama_subkriteria_penilaian' => '1 Bulan',
                'bobot_subkriteria_penilaian' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 4,
                'kode_subkriteria_penilaian' => 'SP10',
                'nama_subkriteria_penilaian' => '3 Bulan',
                'bobot_subkriteria_penilaian' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 4,
                'kode_subkriteria_penilaian' => 'SP11',
                'nama_subkriteria_penilaian' => '3 Tahun',
                'bobot_subkriteria_penilaian' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 5,
                'kode_subkriteria_penilaian' => 'SP12',
                'nama_subkriteria_penilaian' => 'Menunda kehamilan',
                'bobot_subkriteria_penilaian' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 5,
                'kode_subkriteria_penilaian' => 'SP13',
                'nama_subkriteria_penilaian' => 'Menjarangkan kehamilan',
                'bobot_subkriteria_penilaian' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 5,
                'kode_subkriteria_penilaian' => 'SP14',
                'nama_subkriteria_penilaian' => 'Tidak hamil lagi',
                'bobot_subkriteria_penilaian' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
