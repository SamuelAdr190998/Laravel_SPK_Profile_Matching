<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            AspekPenilaianSeeder::class,
            KriteriaPenilaianSeeder::class,
            SubkriteriaPenilaianSeeder::class,
            DataAlternatifSeeder::class,
            DataPenilaianSeeder::class
        ]);
    }
}
