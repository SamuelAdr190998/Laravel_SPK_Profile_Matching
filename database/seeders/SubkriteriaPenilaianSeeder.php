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
                'nama_subkriteria_penilaian' => 'Tidak Memuaskan',
                'bobot_subkriteria_penilaian' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 1,
                'kode_subkriteria_penilaian' => 'SP2',
                'nama_subkriteria_penilaian' => 'Perlu Perbaikan',
                'bobot_subkriteria_penilaian' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 1,
                'kode_subkriteria_penilaian' => 'SP3',
                'nama_subkriteria_penilaian' => 'Memenuhi Harapan',
                'bobot_subkriteria_penilaian' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 1,
                'kode_subkriteria_penilaian' => 'SP4',
                'nama_subkriteria_penilaian' => 'Melebihi Harapan',
                'bobot_subkriteria_penilaian' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 1,
                'kode_subkriteria_penilaian' => 'SP5',
                'nama_subkriteria_penilaian' => 'Luar Biasa',
                'bobot_subkriteria_penilaian' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 2,
                'kode_subkriteria_penilaian' => 'SP6',
                'nama_subkriteria_penilaian' => 'Tidak Memuaskan',
                'bobot_subkriteria_penilaian' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 2,
                'kode_subkriteria_penilaian' => 'SP7',
                'nama_subkriteria_penilaian' => 'Perlu Perbaikan',
                'bobot_subkriteria_penilaian' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 2,
                'kode_subkriteria_penilaian' => 'SP8',
                'nama_subkriteria_penilaian' => 'Memenuhi Harapan',
                'bobot_subkriteria_penilaian' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 2,
                'kode_subkriteria_penilaian' => 'SP9',
                'nama_subkriteria_penilaian' => 'Melebihi Harapan',
                'bobot_subkriteria_penilaian' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 2,
                'kode_subkriteria_penilaian' => 'SP10',
                'nama_subkriteria_penilaian' => 'Luar Biasa',
                'bobot_subkriteria_penilaian' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 3,
                'kode_subkriteria_penilaian' => 'SP11',
                'nama_subkriteria_penilaian' => 'Tidak Memuaskan',
                'bobot_subkriteria_penilaian' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 3,
                'kode_subkriteria_penilaian' => 'SP12',
                'nama_subkriteria_penilaian' => 'Perlu Perbaikan',
                'bobot_subkriteria_penilaian' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 3,
                'kode_subkriteria_penilaian' => 'SP13',
                'nama_subkriteria_penilaian' => 'Memenuhi Harapan',
                'bobot_subkriteria_penilaian' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 3,
                'kode_subkriteria_penilaian' => 'SP14',
                'nama_subkriteria_penilaian' => 'Melebihi Harapan',
                'bobot_subkriteria_penilaian' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 3,
                'kode_subkriteria_penilaian' => 'SP15',
                'nama_subkriteria_penilaian' => 'Luar Biasa',
                'bobot_subkriteria_penilaian' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 4,
                'kode_subkriteria_penilaian' => 'SP16',
                'nama_subkriteria_penilaian' => 'Tidak Memuaskan',
                'bobot_subkriteria_penilaian' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 4,
                'kode_subkriteria_penilaian' => 'SP17',
                'nama_subkriteria_penilaian' => 'Perlu Perbaikan',
                'bobot_subkriteria_penilaian' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 4,
                'kode_subkriteria_penilaian' => 'SP18',
                'nama_subkriteria_penilaian' => 'Memenuhi Harapan',
                'bobot_subkriteria_penilaian' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 4,
                'kode_subkriteria_penilaian' => 'SP19',
                'nama_subkriteria_penilaian' => 'Melebihi Harapan',
                'bobot_subkriteria_penilaian' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 4,
                'kode_subkriteria_penilaian' => 'SP20',
                'nama_subkriteria_penilaian' => 'Luar Biasa',
                'bobot_subkriteria_penilaian' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 5,
                'kode_subkriteria_penilaian' => 'SP21',
                'nama_subkriteria_penilaian' => 'Tidak Memuaskan',
                'bobot_subkriteria_penilaian' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 5,
                'kode_subkriteria_penilaian' => 'SP22',
                'nama_subkriteria_penilaian' => 'Perlu Perbaikan',
                'bobot_subkriteria_penilaian' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 5,
                'kode_subkriteria_penilaian' => 'SP23',
                'nama_subkriteria_penilaian' => 'Memenuhi Harapan',
                'bobot_subkriteria_penilaian' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 5,
                'kode_subkriteria_penilaian' => 'SP24',
                'nama_subkriteria_penilaian' => 'Melebihi Harapan',
                'bobot_subkriteria_penilaian' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria_penilaian' => 5,
                'kode_subkriteria_penilaian' => 'SP25',
                'nama_subkriteria_penilaian' => 'Luar Biasa',
                'bobot_subkriteria_penilaian' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
