<?php

namespace Database\Seeders;

use App\Models\Tagihan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tagihan::create([
           'id_penggunaan' => 1,
           'id_pelanggan' => 1,
           'bulan' => 'Januari',
           'tahun' => 2024,
           'jumlah_meter' => 50,
           'status' => 'Belum Lunas',
        ]);

        Tagihan::create([
           'id_penggunaan' => 2,
           'id_pelanggan' => 2,
           'bulan' => 'Januari',
           'tahun' => 2024,
           'jumlah_meter' => 100,
           'status' => 'Belum Lunas',
        ]);
    }
}
