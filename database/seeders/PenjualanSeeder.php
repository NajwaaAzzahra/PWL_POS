<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
            'penjualan_id' => 1, 
            'user_id' => 3, 
            'pembeli' => 'Lukman Hakim',
            'penjualan_kode' => 'TR3000',
            'penjualan_tanggal' => '2024-03-04'
            ],
            [
            'penjualan_id' => 2, 
            'user_id' => 3, 
            'pembeli' => 'Lucy Diana',
            'penjualan_kode' => 'TR3001',
            'penjualan_tanggal' => '2024-03-04'
            ],
            [
            'penjualan_id' => 3, 
            'user_id' => 3, 
            'pembeli' => 'Hilda Dwi',
            'penjualan_kode' => 'TR3002',
            'penjualan_tanggal' => '2024-03-04'
            ],
            [
            'penjualan_id' => 4, 
            'user_id' => 3, 
            'pembeli' => 'Farhan Alif',
            'penjualan_kode' => 'TR3003',
            'penjualan_tanggal' => '2024-03-04'
            ],
            [
            'penjualan_id' => 5, 
            'user_id' => 3, 
            'pembeli' => 'Citra Oktavia',
            'penjualan_kode' => 'TR3004',
            'penjualan_tanggal' => '2024-03-04'
            ],
            [
            'penjualan_id' => 6, 
            'user_id' => 3, 
            'pembeli' => 'Ivan Hamid',
            'penjualan_kode' => 'TR3005',
            'penjualan_tanggal' => '2024-03-04'
            ],
            [
            'penjualan_id' => 7, 
            'user_id' => 3, 
            'pembeli' => 'Laila Yulianti',
            'penjualan_kode' => 'TR3006',
            'penjualan_tanggal' => '2024-03-04'
            ],
            [
            'penjualan_id' => 8, 
            'user_id' => 3, 
            'pembeli' => 'Mariska Aulia',
            'penjualan_kode' => 'TR3007',
            'penjualan_tanggal' => '2024-03-04'
            ],
            [
            'penjualan_id' => 9, 
            'user_id' => 3, 
            'pembeli' => 'Nando Ardiansyah',
            'penjualan_kode' => 'TR3008',
            'penjualan_tanggal' => '2024-03-04'
            ],
            [
            'penjualan_id' => 10, 
            'user_id' => 3, 
            'pembeli' => 'Putri Ajeng',
            'penjualan_kode' => 'TR3009',
            'penjualan_tanggal' => '2024-03-04'
            ],
        ];

        // Simpan data ke dalam tabel menggunakan DB::table()
        DB::table('t_penjualan')->insert($data);
    }
}
