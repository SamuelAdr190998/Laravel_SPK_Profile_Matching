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
                'kode_kriteria_penilaian' => 'K1',
                'nama_kriteria_penilaian' => 'Usia',
                'bobot_kriteria_penilaian' => 5,
                'status_kriteria_penilaian' => 'Faktor Utama',
                'persentase_kriteria_penilaian' => 60,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_aspek_penilaian' => 1,
                'kode_kriteria_penilaian' => 'K2',
                'nama_kriteria_penilaian' => 'Jumlah Anak',
                'bobot_kriteria_penilaian' => 5,
                'status_kriteria_penilaian' => 'Faktor Utama',
                'persentase_kriteria_penilaian' => 60,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_aspek_penilaian' => 1,
                'kode_kriteria_penilaian' => 'K3',
                'nama_kriteria_penilaian' => 'Tekanan Darah',
                'bobot_kriteria_penilaian' => 5,
                'status_kriteria_penilaian' => 'Faktor Utama',
                'persentase_kriteria_penilaian' => 60,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_aspek_penilaian' => 1,
                'kode_kriteria_penilaian' => 'K4',
                'nama_kriteria_penilaian' => 'Jangka Waktu',
                'bobot_kriteria_penilaian' => 5,
                'status_kriteria_penilaian' => 'Faktor Pendukung',
                'persentase_kriteria_penilaian' => 40,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_aspek_penilaian' => 1,
                'kode_kriteria_penilaian' => 'K5',
                'nama_kriteria_penilaian' => 'Tujuan Pemakaian',
                'bobot_kriteria_penilaian' => 5,
                'status_kriteria_penilaian' => 'Faktor Pendukung',
                'persentase_kriteria_penilaian' => 40,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
