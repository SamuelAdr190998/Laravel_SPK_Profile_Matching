<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_sub_kriteria')->insert([
            [
                'id_kriteria' => 1,
                'kode_sub_kriteria' => 'SB1',
                'nama_sub_kriteria' => 'Tamu Lawan Jenis Diizinkan Masuk',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 1,
                'kode_sub_kriteria' => 'SB2',
                'nama_sub_kriteria' => 'Biaya Kebersihan Termasuk Biaya Kos',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 1,
                'kode_sub_kriteria' => 'SB3',
                'nama_sub_kriteria' => 'Tamu Boleh Berkunjung',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 1,
                'kode_sub_kriteria' => 'SB4',
                'nama_sub_kriteria' => 'Biaya Bulanan Termasuk Listrik',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 1,
                'kode_sub_kriteria' => 'SB5',
                'nama_sub_kriteria' => 'Tamu Lawan Jenis Dilarang Masuk',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 2,
                'kode_sub_kriteria' => 'SB6',
                'nama_sub_kriteria' => 'Kamar Mandi Diluar',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 2,
                'kode_sub_kriteria' => 'SB7',
                'nama_sub_kriteria' => 'Kulkas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 2,
                'kode_sub_kriteria' => 'SB8',
                'nama_sub_kriteria' => 'TV Bersama',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 2,
                'kode_sub_kriteria' => 'SB9',
                'nama_sub_kriteria' => 'Dapur',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 2,
                'kode_sub_kriteria' => 'SB10',
                'nama_sub_kriteria' => 'Cleaning Service',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 2,
                'kode_sub_kriteria' => 'SB11',
                'nama_sub_kriteria' => 'Ruang Tamu',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 2,
                'kode_sub_kriteria' => 'SB12',
                'nama_sub_kriteria' => 'Penjaga Kos',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 2,
                'kode_sub_kriteria' => 'SB13',
                'nama_sub_kriteria' => 'CCTV',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 2,
                'kode_sub_kriteria' => 'SB14',
                'nama_sub_kriteria' => 'WiFi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 3,
                'kode_sub_kriteria' => 'SB15',
                'nama_sub_kriteria' => 'TV',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 3,
                'kode_sub_kriteria' => 'SB16',
                'nama_sub_kriteria' => 'AC',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 3,
                'kode_sub_kriteria' => 'SB17',
                'nama_sub_kriteria' => 'Kipas Angin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 3,
                'kode_sub_kriteria' => 'SB18',
                'nama_sub_kriteria' => 'Meja Belajar',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 3,
                'kode_sub_kriteria' => 'SB19',
                'nama_sub_kriteria' => 'Lemari',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 3,
                'kode_sub_kriteria' => 'SB20',
                'nama_sub_kriteria' => 'Kasur',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 3,
                'kode_sub_kriteria' => 'SB21',
                'nama_sub_kriteria' => 'Kamar Mandi Didalam',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 4,
                'kode_sub_kriteria' => 'SB22',
                'nama_sub_kriteria' => '5 KM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 4,
                'kode_sub_kriteria' => 'SB23',
                'nama_sub_kriteria' => '3 - 4 KM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 4,
                'kode_sub_kriteria' => 'SB24',
                'nama_sub_kriteria' => '1 - 2 KM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 4,
                'kode_sub_kriteria' => 'SB25',
                'nama_sub_kriteria' => 'Kurang dari 1 KM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 5,
                'kode_sub_kriteria' => 'SB26',
                'nama_sub_kriteria' => 'Lebih dari 2 Juta/Bulan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 5,
                'kode_sub_kriteria' => 'SB27',
                'nama_sub_kriteria' => '1.6 Juta - 1.9 Juta/Bulan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 5,
                'kode_sub_kriteria' => 'SB28',
                'nama_sub_kriteria' => '1.2 Juta - 1.5 Juta/Bulan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 5,
                'kode_sub_kriteria' => 'SB29',
                'nama_sub_kriteria' => '800 Ribu - 1.1 Juta/Bulan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 5,
                'kode_sub_kriteria' => 'SB30',
                'nama_sub_kriteria' => '400 Ribu - 700 Ribu/Bulan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 6,
                'kode_sub_kriteria' => 'SB31',
                'nama_sub_kriteria' => '>Berdua',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 6,
                'kode_sub_kriteria' => 'SB32',
                'nama_sub_kriteria' => 'Berdua',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 6,
                'kode_sub_kriteria' => 'SB33',
                'nama_sub_kriteria' => 'Sendiri',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
