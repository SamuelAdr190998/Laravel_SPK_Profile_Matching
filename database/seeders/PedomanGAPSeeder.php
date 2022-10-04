<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedomanGAPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedoman_gap')->insert([
            [
                'ketentuan_selisih' => 0,
                'bobot_nilai' => 5,
                'keterangan' => 'Tidak ada selisih (Kompetensi sesuai yang dibutuhkan)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'ketentuan_selisih' => 1,
                'bobot_nilai' => 4.5,
                'keterangan' => 'Kompetensi individu kelebihan 1 tingkat/level',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'ketentuan_selisih' => -1,
                'bobot_nilai' => 4,
                'keterangan' => 'Kompetensi individu kekurangan 1 tingkat/level',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'ketentuan_selisih' => 2,
                'bobot_nilai' => 3.5,
                'keterangan' => 'Kompetensi individu kelebihan 2 tingkat/level',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'ketentuan_selisih' => -2,
                'bobot_nilai' => 3,
                'keterangan' => 'Kompetensi individu kekurangan 2 tingkat/level',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'ketentuan_selisih' => 3,
                'bobot_nilai' => 2.5,
                'keterangan' => 'Kompetensi individu kelebihan 3 tingkat/level',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'ketentuan_selisih' => -3,
                'bobot_nilai' => 2,
                'keterangan' => 'Kompetensi individu kekurangan 3 tingkat/level',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'ketentuan_selisih' => 4,
                'bobot_nilai' => 1.5,
                'keterangan' => 'Kompetensi individu kelebihan 4 tingkat/level',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'ketentuan_selisih' => -4,
                'bobot_nilai' => 1,
                'keterangan' => 'Kompetensi individu kekurangan 4 tingkat/level',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
