<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('m_supplier')->insert([
            [
                'supplier_kode' => 'SUP01',
                'supplier_nama' => 'PT Sumber Rejeki',
                'supplier_alamat' => 'Malang',
            ],
            [
                'supplier_kode' => 'SUP02',
                'supplier_nama' => 'PT Makmur Jaya',
                'supplier_alamat' => 'Surabaya',
            ],
        ]);
    }
}