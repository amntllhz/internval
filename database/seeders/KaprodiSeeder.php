<?php

namespace Database\Seeders;

use App\Models\Kaprodi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KaprodiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Kaprodi::create([
            'nama_kaprodi' => 'Fenilinas Adi Artanto S.Si., M.Si',
            'nidn' => '0614078802',
            'prodi' => 'S1 Informatika',
        ]);

        Kaprodi::create([
            'nama_kaprodi' => 'Ir. Towijaya, S.T., M.T., IPM',
            'nidn' => '0627117605',
            'prodi' => 'S1 Teknik Mesin',
        ]);

        Kaprodi::create([
            'nama_kaprodi' => 'Hadwitya Handayani Kusumawardhani S.kom., M.Kom',
            'nidn' => '0619078903',
            'prodi' => 'D3 Manajemen Informatika',
        ]);
    }
}
