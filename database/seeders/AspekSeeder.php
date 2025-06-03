<?php

namespace Database\Seeders;

use App\Models\AspekSPBE;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AspekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aspeks = [
            ['nama_aspek' => 'Aspek 7 - Layanan Administrasi Pemerintah Berbasis Elektronik'],
            ['nama_aspek' => 'Aspek 8 - Layanan Publik Berbasis Elektronik'],
        ];

        foreach ($aspeks as $aspek) {
            AspekSPBE::create($aspek);
        }
    }
}
