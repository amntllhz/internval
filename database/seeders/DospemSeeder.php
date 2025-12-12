<?php

namespace Database\Seeders;

use App\Models\Dospem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DospemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Dospem::create([
            'nama_dosen' => 'Fenilinas Adi Artanto S.Si., M.Si',
            'nidn' => '0614078802',
            'email' => 'pakfeni@gmail.com',
            'prodi' => 'S1 Informatika',
        ]);

        Dospem::create([
            'nama_dosen' => 'Aslam Fatkhudin S.Kom., M.Kom',
            'nidn' => '0616058201',
            'email' => 'pakaslam@gmail.com',
            'prodi' => 'S1 Informatika',
        ]);

        Dospem::create([
            'nama_dosen' => 'Hadwitya Handayani Kusumawardhani S.kom., M.Kom',
            'nidn' => '0619078903',
            'email' => 'butya@gmail.com',
            'prodi' => 'S1 Informatika',
        ]);
    }
}
