<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaPenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kriteria_penilaian')->insert([
            [
                'id_aspek_penilaian' => 1,
                'kode_kriteria_penilaian' => 'KP1',
                'nama_kriteria_penilaian' => 'Disiplin',
                'bobot_kriteria_penilaian' => 3,
                'status_kriteria_penilaian' => 'Faktor Pendukung',
                'persentase_kriteria_penilaian' => 40,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_aspek_penilaian' => 1,
                'kode_kriteria_penilaian' => 'KP2',
                'nama_kriteria_penilaian' => 'Komitmen',
                'bobot_kriteria_penilaian' => 3,
                'status_kriteria_penilaian' => 'Faktor Utama',
                'persentase_kriteria_penilaian' => 60,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_aspek_penilaian' => 1,
                'kode_kriteria_penilaian' => 'KP3',
                'nama_kriteria_penilaian' => 'Prestasi',
                'bobot_kriteria_penilaian' => 3,
                'status_kriteria_penilaian' => 'Faktor Utama',
                'persentase_kriteria_penilaian' => 60,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_aspek_penilaian' => 1,
                'kode_kriteria_penilaian' => 'KP4',
                'nama_kriteria_penilaian' => 'Kreatifitas',
                'bobot_kriteria_penilaian' => 3,
                'status_kriteria_penilaian' => 'Faktor Pendukung',
                'persentase_kriteria_penilaian' => 40,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_aspek_penilaian' => 1,
                'kode_kriteria_penilaian' => 'KP5',
                'nama_kriteria_penilaian' => 'Loyalitas',
                'bobot_kriteria_penilaian' => 3,
                'status_kriteria_penilaian' => 'Faktor Utama',
                'persentase_kriteria_penilaian' => 60,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
