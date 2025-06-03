<?php

namespace Database\Seeders;

use App\Models\IndikatorSPBE;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndikatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $indikators = [
            ['aspek_id' => 1, 'nama_indikator' => 'Indikator 32 - Layanan Perencanaan', 'domain_cobit' => 'APO02', 'nama_cobit' => 'Mengelola Strategi'],
            ['aspek_id' => 1, 'nama_indikator' => 'Indikator 33 - Layanan Penganggaran', 'domain_cobit' => 'APO03', 'nama_cobit' => 'Mengelola Arsitektur'],
            ['aspek_id' => 1, 'nama_indikator' => 'Indikator 34 - Layanan Keuangan', 'domain_cobit' => 'APO06', 'nama_cobit' => 'Mengelola Anggaran dan Biaya'],
            ['aspek_id' => 1, 'nama_indikator' => 'Indikator 35 - Layanan Pengadaan Barang dan Jasa', 'domain_cobit' => 'APO10', 'nama_cobit' => 'Mengelola Pemasok/Vendor'],
            ['aspek_id' => 1, 'nama_indikator' => 'Indikator 36 - Layanan Kepegawaian', 'domain_cobit' => 'APO07', 'nama_cobit' => 'Mengelola SDM'],
            ['aspek_id' => 1, 'nama_indikator' => 'Indikator 37 - Layanan Kearsipan Dinamis', 'domain_cobit' => 'DSS01', 'nama_cobit' => 'Mengelola Operasi'],
            ['aspek_id' => 1, 'nama_indikator' => 'Indikator 38 - Layanan Pengelolaan Barang Milik Negara/Daerah', 'domain_cobit' => 'DSS01', 'nama_cobit' => 'Mengelola Operasi'],
            ['aspek_id' => 1, 'nama_indikator' => 'Indikator 39 - Layanan Pengawasan Internal Pemerintah', 'domain_cobit' => 'MEA03', 'nama_cobit' => 'Memantau, Evaluasi dan Menilai Kepatuhan dengan Persyaratan Eksternal'],
            ['aspek_id' => 1, 'nama_indikator' => 'Indikator 40 - Layanan Akuntabilitas Kinerja Organisasi', 'domain_cobit' => 'MEA01', 'nama_cobit' => 'Memantau, Evaluasi dan Menilai Kepatuhan dengan Persyaratan Eksternal'],
            ['aspek_id' => 1, 'nama_indikator' => 'Indikator 41 - Layanan Kinerja Pegawai', 'domain_cobit' => 'APO07', 'nama_cobit' => 'Mengelola SDM'],
            ['aspek_id' => 2, 'nama_indikator' => 'Indikator 42 - Layanan Pengaduan Pelayanan', 'domain_cobit' => 'DSS04', 'nama_cobit' => 'Mengelola Keberlangsungan'],
            ['aspek_id' => 2, 'nama_indikator' => 'Indikator 43 - Layanan Data Terbuka', 'domain_cobit' => 'DSS05', 'nama_cobit' => 'Mengelola Jasa Keamanan'],
            ['aspek_id' => 2, 'nama_indikator' => 'Indikator 44 - Jaringan Dokumentasi dan Informasi Hukum (JDIH)', 'domain_cobit' => 'DSS01', 'nama_cobit' => 'Mengelola Layanan Permohonan dan Kecelakaan'],
            ['aspek_id' => 2, 'nama_indikator' => 'Indikator 45 - Layanan Publik Sektor 1', 'domain_cobit' => 'DSS02', 'nama_cobit' => 'Mengelola Layanan Permohonan dan Kecelakaan'],
            ['aspek_id' => 2, 'nama_indikator' => 'Indikator 46 - Layanan Publik Sektor 2', 'domain_cobit' => 'DSS03', 'nama_cobit' => 'Mengelola Masalah'],
            ['aspek_id' => 2, 'nama_indikator' => 'Indikator 47 - Layanan Publik Sektor 3', 'domain_cobit' => 'MEA02', 'nama_cobit' => 'Memantau, Evaluasi, dan Menilai Sistem Pengendalian Internal'],
        ];

        foreach ($indikators as $indikator) {
            IndikatorSPBE::create($indikator);
        }
    }
}
