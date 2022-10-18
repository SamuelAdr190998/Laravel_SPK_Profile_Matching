<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataPenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_penilaian')->insert([
            [
                'id_alternatif' => 1,
                'id_aspek_penilaian' => 1,
                'id_kriteria_penilaian' => 1,
                'id_subkriteria_penilaian' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_alternatif' => 1,
                'id_aspek_penilaian' => 1,
                'id_kriteria_penilaian' => 2,
                'id_subkriteria_penilaian' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_alternatif' => 1,
                'id_aspek_penilaian' => 1,
                'id_kriteria_penilaian' => 3,
                'id_subkriteria_penilaian' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_alternatif' => 1,
                'id_aspek_penilaian' => 1,
                'id_kriteria_penilaian' => 4,
                'id_subkriteria_penilaian' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_alternatif' => 1,
                'id_aspek_penilaian' => 1,
                'id_kriteria_penilaian' => 5,
                'id_subkriteria_penilaian' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_alternatif' => 2,
                'id_aspek_penilaian' => 1,
                'id_kriteria_penilaian' => 1,
                'id_subkriteria_penilaian' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_alternatif' => 2,
                'id_aspek_penilaian' => 1,
                'id_kriteria_penilaian' => 2,
                'id_subkriteria_penilaian' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_alternatif' => 2,
                'id_aspek_penilaian' => 1,
                'id_kriteria_penilaian' => 3,
                'id_subkriteria_penilaian' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_alternatif' => 2,
                'id_aspek_penilaian' => 1,
                'id_kriteria_penilaian' => 4,
                'id_subkriteria_penilaian' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_alternatif' => 2,
                'id_aspek_penilaian' => 1,
                'id_kriteria_penilaian' => 5,
                'id_subkriteria_penilaian' => 13,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_alternatif' => 3,
                'id_aspek_penilaian' => 1,
                'id_kriteria_penilaian' => 1,
                'id_subkriteria_penilaian' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_alternatif' => 3,
                'id_aspek_penilaian' => 1,
                'id_kriteria_penilaian' => 2,
                'id_subkriteria_penilaian' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_alternatif' => 3,
                'id_aspek_penilaian' => 1,
                'id_kriteria_penilaian' => 3,
                'id_subkriteria_penilaian' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_alternatif' => 3,
                'id_aspek_penilaian' => 1,
                'id_kriteria_penilaian' => 4,
                'id_subkriteria_penilaian' => 11,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_alternatif' => 3,
                'id_aspek_penilaian' => 1,
                'id_kriteria_penilaian' => 5,
                'id_subkriteria_penilaian' => 13,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
