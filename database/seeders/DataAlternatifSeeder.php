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
                'link_kos' => 'https://www.google.com/',
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
                'link_kos' => 'https://www.google.com/',
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
                'link_kos' => 'https://www.google.com/',
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
                'link_kos' => 'https://www.google.com/',
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
                'link_kos' => 'https://www.google.com/',
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
