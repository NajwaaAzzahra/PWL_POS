<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                'kategori_id' => 1,
                'kategori_kode' => 'F01',
                'kategori_nama' => 'Style & Fashion',
            ],
            [
                'kategori_id' => 2,
                'kategori_kode' => 'B02',
                'kategori_nama' => 'Beauty Health',
            ],
            [
                'kategori_id' => 3,
                'kategori_kode' => 'E01',
                'kategori_nama' => 'Electronic',
            ],
            [
                'kategori_id' => 4,
                'kategori_kode' => 'H01',
                'kategori_nama' => 'Home Care',
            ],
            [
                'kategori_id' => 5,
                'kategori_kode' => 'K01',
                'kategori_nama' => 'Baby Kid',
            ],
        ];

        DB::table('m_kategori')->insert($data);
    }
}
