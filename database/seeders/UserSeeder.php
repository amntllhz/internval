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
            'name' => 'dosenit',
            'email' => 'dosenit@gmail.com',
            'password' => 'dosenit',
            'role' => 'dosen_informatika',
        ]);

        User::create([
            'name' => 'dosenmesin',
            'email' => 'dosenmesin@gmail.com',
            'password' => 'dosenmesin',
            'role' => 'dosen_mesin',
        ]);

        User::create([
            'name' => 'baak',
            'email' => 'baak@gmail.com',
            'password' => 'baak',
            'role' => 'baak',
        ]);
    }
}
