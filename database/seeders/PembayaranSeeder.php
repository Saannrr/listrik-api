<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pembayaran::create([
           'id_tagihan' => 1,
           'id_pelanggan' => 1,
           'tanggal_pembayaran' => '2024-01-10',
           'bulan_bayar' => 'Januari',
           'biaya_admin' => 2500,
           'total_bayar' => 52500,
           'id_user' => 1,
        ]);

        Pembayaran::create([
           'id_tagihan' => 2,
           'id_pelanggan' => 2,
           'tanggal_pembayaran' => '2024-01-15',
           'bulan_bayar' => 'Januari',
           'biaya_admin' => 2500,
           'total_bayar' => 152500,
           'id_user' => 2,
        ]);
    }
}
