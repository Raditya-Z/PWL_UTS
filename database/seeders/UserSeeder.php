<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('m_user')->insert([
            [
                'level_id' => 1,
                'username' => 'admin',
                'nama' => 'Administrator',
                'email' => 'admin@uts.com',
                'password' => Hash::make('password'),
            ],
            [
                'level_id' => 2,
                'username' => 'kasir1',
                'nama' => 'Kasir Satu',
                'email' => 'kasir@uts.com',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}