<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('m_barang')->insert([
            [
                'kategori_id' => 1,
                'barang_kode' => 'BRG01',
                'barang_nama' => 'Indomie Goreng',
                'harga_beli' => 2500,
                'harga_jual' => 3000,
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'BRG02',
                'barang_nama' => 'Teh Botol',
                'harga_beli' => 3000,
                'harga_jual' => 4000,
            ],
        ]);
    }
}