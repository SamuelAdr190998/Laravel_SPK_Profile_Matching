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
                'kode_alternatif' => 'KA1',
                'nama_alternatif' => 'Suntik KB 1 Bulan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_alternatif' => 'KA2',
                'nama_alternatif' => 'Pil KB',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_alternatif' => 'KA3',
                'nama_alternatif' => 'Suntik KB 3 Bulan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_alternatif' => 'KA4',
                'nama_alternatif' => 'Spermisida',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_alternatif' => 'KA5',
                'nama_alternatif' => 'Implan KB',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_alternatif' => 'KA6',
                'nama_alternatif' => 'IUD/Spiral',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_alternatif' => 'KA7',
                'nama_alternatif' => 'Tubektomi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
