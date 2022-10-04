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
                'nama_kriteria_penilaian' => 'Usia',
                'bobot_kriteria_penilaian' => 5,
                'status_kriteria_penilaian' => 'Faktor Utama',
                'persentase_kriteria_penilaian' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_aspek_penilaian' => 1,
                'kode_kriteria_penilaian' => 'KP2',
                'nama_kriteria_penilaian' => 'Riwayat penyakit',
                'bobot_kriteria_penilaian' => 5,
                'status_kriteria_penilaian' => 'Faktor Utama',
                'persentase_kriteria_penilaian' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_aspek_penilaian' => 1,
                'kode_kriteria_penilaian' => 'KP3',
                'nama_kriteria_penilaian' => 'Berat badan',
                'bobot_kriteria_penilaian' => 5,
                'status_kriteria_penilaian' => 'Faktor Pendukung',
                'persentase_kriteria_penilaian' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_aspek_penilaian' => 1,
                'kode_kriteria_penilaian' => 'KP4',
                'nama_kriteria_penilaian' => 'ASI',
                'bobot_kriteria_penilaian' => 5,
                'status_kriteria_penilaian' => 'Faktor Utama',
                'persentase_kriteria_penilaian' => 25,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_aspek_penilaian' => 1,
                'kode_kriteria_penilaian' => 'KP5',
                'nama_kriteria_penilaian' => 'Riwayat persalinan',
                'bobot_kriteria_penilaian' => 5,
                'status_kriteria_penilaian' => 'Faktor Pendukung',
                'persentase_kriteria_penilaian' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_aspek_penilaian' => 1,
                'kode_kriteria_penilaian' => 'KP6',
                'nama_kriteria_penilaian' => 'Jangka pemakaian',
                'bobot_kriteria_penilaian' => 2,
                'status_kriteria_penilaian' => 'Faktor Pendukung',
                'persentase_kriteria_penilaian' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_aspek_penilaian' => 1,
                'kode_kriteria_penilaian' => 'KP7',
                'nama_kriteria_penilaian' => 'Biaya',
                'bobot_kriteria_penilaian' => 4,
                'status_kriteria_penilaian' => 'Faktor Pendukung',
                'persentase_kriteria_penilaian' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
