<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'FAS01',
                'barang_nama' => 'Kemeja Flanel',
                'harga_beli' => 150000,
                'harga_jual' => 210000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 2,
                'barang_kode' => 'BEA01',
                'barang_nama' => 'Vitamin C Serum',
                'harga_beli' => 75000,
                'harga_jual' => 100000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 3,
                'barang_kode' => 'ELE01',
                'barang_nama' => 'TWS Earphone',
                'harga_beli' => 85000,
                'harga_jual' => 110000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 4,
                'barang_kode' => 'HOM01',
                'barang_nama' => 'Air Humidifier',
                'harga_beli' => 135000,
                'harga_jual' => 170000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 5,
                'barang_kode' => 'BAB01',
                'barang_nama' => 'Baby Sleepsuit',
                'harga_beli' => 90000,
                'harga_jual' => 130000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 1,
                'barang_kode' => 'FAS02',
                'barang_nama' => 'Basic Skirt',
                'harga_beli' => 190000,
                'harga_jual' => 255000,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 2,
                'barang_kode' => 'BEA02',
                'barang_nama' => 'Lemon Face Mask',
                'harga_beli' => 7000,
                'harga_jual' => 11000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 3,
                'barang_kode' => 'ELE02',
                'barang_nama' => 'Hair Dryer',
                'harga_beli' => 135000,
                'harga_jual' => 170000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 4,
                'barang_kode' => 'HOM02',
                'barang_nama' => 'Scented Candle',
                'harga_beli' => 35000,
                'harga_jual' => 55000,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => 'BAB02',
                'barang_nama' => 'Baby Playmat',
                'harga_beli' => 70000,
                'harga_jual' => 95000,
            ],            
        ];
        DB::table('m_barang')->insert($data);
    }
}
