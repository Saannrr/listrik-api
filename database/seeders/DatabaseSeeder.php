<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
           LevelSeeder::class,
           UserSeeder::class,
            TarifSeeder::class,
            PelangganSeeder::class,
            PenggunaanSeeder::class,
            TagihanSeeder::class,
            PembayaranSeeder::class,
        ]);
    }
}