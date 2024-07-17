<?php

namespace Database\Seeders;

use App\Models\Penggunaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenggunaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penggunaan::create([
           'id_pelanggan' => 1,
           'bulan' => 'Januari',
           'tahun' => 2024,
           'meter_awal' => 100,
            'meter_akhir' => 150,
        ]);

        Penggunaan::create([
           'id_pelanggan' => 2,
           'bulan' => 'Januari',
           'tahun' => 2024,
           'meter_awal' => 200,
            'meter_akhir' => 300,
        ]);
    }
}
