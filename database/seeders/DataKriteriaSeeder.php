<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_kriteria')->insert([
            [
                'kode_kriteria' => 'K1',
                'nama_kriteria' => 'Peraturan',
                'bobot_kriteria' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_kriteria' => 'K2',
                'nama_kriteria' => 'Fasilitas Bersama',
                'bobot_kriteria' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_kriteria' => 'K3',
                'nama_kriteria' => 'Fasilitas Kamar',
                'bobot_kriteria' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_kriteria' => 'K4',
                'nama_kriteria' => 'Jarak Kos ke USU',
                'bobot_kriteria' => 33.3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_kriteria' => 'K5',
                'nama_kriteria' => 'Harga',
                'bobot_kriteria' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_kriteria' => 'K6',
                'nama_kriteria' => 'Tipe Kos',
                'bobot_kriteria' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
