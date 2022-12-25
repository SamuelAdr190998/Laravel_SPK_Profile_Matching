<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataAlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_alternatif')->insert([
            [
                'kode_alternatif' => 'A1',
                'nama_kos' => 'Kos A',
                'pemilik_kos' => 'Ahmad Zainuddin',
                'jenis_kos' => 'Putra',
                'alamat_kos' => 'Jonggol',
                'whatsapp_kos' => '081234567891',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_alternatif' => 'A2',
                'nama_kos' => 'Kos B',
                'pemilik_kos' => 'Putra Zainuddin',
                'jenis_kos' => 'Putra',
                'alamat_kos' => 'Jonggol',
                'whatsapp_kos' => '081234567891',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_alternatif' => 'A3',
                'nama_kos' => 'Kos C',
                'pemilik_kos' => 'Samsul Zainuddin',
                'jenis_kos' => 'Putra',
                'alamat_kos' => 'Jonggol',
                'whatsapp_kos' => '081234567891',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_alternatif' => 'A4',
                'nama_kos' => 'Kos D',
                'pemilik_kos' => 'Budi Zainuddin',
                'jenis_kos' => 'Putra',
                'alamat_kos' => 'Jonggol',
                'whatsapp_kos' => '081234567891',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_alternatif' => 'A5',
                'nama_kos' => 'Kos E',
                'pemilik_kos' => 'Kamis Zainuddin',
                'jenis_kos' => 'Putra',
                'alamat_kos' => 'Jonggol',
                'whatsapp_kos' => '081234567891',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
