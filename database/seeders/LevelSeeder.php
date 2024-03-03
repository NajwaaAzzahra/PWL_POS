<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['level_id' => 1, 'level_kode' => 'ADM', 'level_Nama' => 'Administrator'],
            ['level_id' => 2, 'level_kode' => 'MNG', 'level_Nama' => 'Manager'],
            ['level_id' => 3, 'level_kode' => 'STF', 'level_Nama' => 'Staff/Kasir'],
        ];

        // Simpan data ke dalam tabel menggunakan DB::table()
        DB::table('m_level')->insert($data);
    }
}
