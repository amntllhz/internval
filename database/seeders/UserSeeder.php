<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'kaprodiit',
            'email' => 'kaprodiit@gmail.com',
            'password' => 'kaprodiit',
            'role' => 'kaprodi_informatika',
        ]);

        User::create([
            'name' => 'kaprodimesin',
            'email' => 'kaprodimesin@gmail.com',
            'password' => 'kaprodimesin',
            'role' => 'kaprodi_mesin',
        ]);

        User::create([
            'name' => 'kaprodimanajemenit',
            'email' => 'kaprodimanajemenit@gmail.com',
            'password' => 'kaprodimanajemenit',
            'role' => 'kaprodi_manajemenit',
        ]);

        User::create([
            'name' => 'baak',
            'email' => 'baak@gmail.com',
            'password' => 'baak',
            'role' => 'baak',
        ]);
    }
}
