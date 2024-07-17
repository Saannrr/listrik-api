<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggan::create([
           'username' => 'pelanggan1',
           'password' => Hash::make('password'),
           'nomor_kwh' => '1234567890',
           'nama_pelanggan' => 'Pelanggan Satu',
           'alamat' => 'Alamat Pelanggan 1',
           'id_tarif' => 1,
        ]);

        Pelanggan::create([
           'username' => 'pelanggan2',
           'password' => Hash::make('password'),
           'nomor_kwh' => '0987654321',
           'nama_pelanggan' => 'Pelanggan Dua',
           'alamat' => 'Alamat Pelanggan 2',
           'id_tarif' => 2,
        ]);
    }
}
