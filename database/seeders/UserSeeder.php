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
            'name' => 'dosen',
            'email' => 'dosen@gmail.com',
            'password' => 'dosen',
            'role' => 'dosen',
        ]);

        User::create([
            'name' => 'baak',
            'email' => 'baak@gmail.com',
            'password' => 'baak',
            'role' => 'baak',
        ]);
    }
}
