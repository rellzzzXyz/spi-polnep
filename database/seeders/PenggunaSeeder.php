<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class PenggunaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pengguna')->insert([
            [
                'nama_lengkap'  => 'Admin',
                'email'         => 'admin@mail.com',
                'password_hash' => Hash::make('password123'),
                'peran'         => 'admin',
                'dibuat_pada'   => Carbon::now(),
            ],
            [
                'nama_lengkap'  => 'Penulis',
                'email'         => 'penulis@mail.com',
                'password_hash' => Hash::make('password123'),
                'peran'         => 'penulis',
                'dibuat_pada'   => Carbon::now(),
            ],
            [
                'nama_lengkap'  => 'User',
                'email'         => 'user@mail.com',
                'password_hash' => Hash::make('password123'),
                'peran'         => 'user',
                'dibuat_pada'   => Carbon::now(),
            ],
        ]);
    }
}