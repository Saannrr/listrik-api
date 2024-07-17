<?php

namespace Database\Seeders;

use App\Models\Tarif;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TarifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tarif::create([
            'daya' => 450,
            'tarifperkwh' => 1000
        ]);

        Tarif::create([
            'daya' => 900,
            'tarifperkwh' => 1500
        ]);

        Tarif::create([
            'daya' => 1300,
            'tarifperkwh' => 2000
        ]);
    }
}
