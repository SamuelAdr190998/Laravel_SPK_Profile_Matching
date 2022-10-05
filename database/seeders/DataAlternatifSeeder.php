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
                'nama_alternatif' => 'Mr. X',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_alternatif' => 'KA2',
                'nama_alternatif' => 'Mr. Y',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_alternatif' => 'KA3',
                'nama_alternatif' => 'Mr. Z',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
