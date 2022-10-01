<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'nama_user' => 'Administrator',
            'email' => 'admin@admin.com',
            'nomor_handphone' => '081234567891',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
