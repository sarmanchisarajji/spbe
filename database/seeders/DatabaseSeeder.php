<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\IndikatorSPBE;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AspekSeeder::class,
            IndikatorSeeder::class,
            PertanyaanSeeder::class,
            UserSeeder::class,
        ]);
    }
}
