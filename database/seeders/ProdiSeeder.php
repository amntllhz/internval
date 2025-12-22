<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Prodi::create([
            'nama' => 'S1 Informatika',
        ]);

        Prodi::create([
            'nama' => 'S1 Teknik Mesin',
        ]);

        Prodi::create([
            'nama' => 'D3 Manajemen Informatika',
        ]);
    }
}
