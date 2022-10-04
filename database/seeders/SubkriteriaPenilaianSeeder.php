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
                'nama_subkriteria_penilaian' => 'A',
                'bobot_subkriteria_penilaian' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 1,
                'kode_subkriteria_penilaian' => 'SP2',
                'nama_subkriteria_penilaian' => 'B',
                'bobot_subkriteria_penilaian' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 1,
                'kode_subkriteria_penilaian' => 'SP3',
                'nama_subkriteria_penilaian' => 'C',
                'bobot_subkriteria_penilaian' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 1,
                'kode_subkriteria_penilaian' => 'SP4',
                'nama_subkriteria_penilaian' => 'D',
                'bobot_subkriteria_penilaian' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 1,
                'kode_subkriteria_penilaian' => 'SP5',
                'nama_subkriteria_penilaian' => 'E',
                'bobot_subkriteria_penilaian' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 1,
                'kode_subkriteria_penilaian' => 'SP6',
                'nama_subkriteria_penilaian' => 'F',
                'bobot_subkriteria_penilaian' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
