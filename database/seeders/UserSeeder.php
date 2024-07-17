<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
           'username' => 'admin',
           'password' => Hash::make('password'),
           'nama_admin' => 'Admin Name',
           'id_level' => 1,
        ]);

        User::create([
           'username' => 'user1',
           'password' => Hash::make('password'),
           'nama_admin' => 'User One',
           'id_level' => 2,
        ]);
    }
}
