<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'nama_lengkap' => 'Adminstrator',
            'email' => 'admin@gmail.com',
            'role' => 'level1',
            'alamat' => 'JL. HEA Mokodompit',
            'foto' => null,
            'no_hp' => null,
            'password' => Hash::make('admin12345'),
        ]);

        User::create([
            'username' => 'karyawan',
            'nama_lengkap' => 'Pegawai',
            'email' => 'karyawan@gmail.com',
            'role' => 'level2',
            'alamat' => 'JL. HEA Mokodompit',
            'foto' => null,
            'no_hp' => null,
            'password' => Hash::make('karyawan12345'),
        ]);
    }
}
