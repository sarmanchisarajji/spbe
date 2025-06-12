<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class CobitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cobits')->insert([
            // Indikator 32 (indikator_id = 1)
            ['indikator_id' => 1, 'level' => 1, 'pertanyaan' => 'Apakah proses perencanaan strategis SPBE telah dilakukan dan menghasilkan output?'],
            ['indikator_id' => 1, 'level' => 2, 'pertanyaan' => 'Apakah kinerja dari strategi SPBE dipantau?'],
            ['indikator_id' => 1, 'level' => 2, 'pertanyaan' => 'Apakah dokumen perencanaan dan pelaksanaan SPBE terdokumentasi dan dikelola?'],
            ['indikator_id' => 1, 'level' => 3, 'pertanyaan' => 'Apakah proses perencanaan SPBE ditetapkan secara formal?'],
            ['indikator_id' => 1, 'level' => 3, 'pertanyaan' => 'Apakah proses pengelolaan strategi TI telah diterapkan di seluruh bidang di Kominfo?'],
            ['indikator_id' => 1, 'level' => 4, 'pertanyaan' => 'Apakah efektivitas proses strategi diukur dengan indikator yang jelas?'],
            ['indikator_id' => 1, 'level' => 4, 'pertanyaan' => 'Apakah terdapat mekanisme pengendalian terhadap pelaksanaan strategi?'],
            ['indikator_id' => 1, 'level' => 5, 'pertanyaan' => 'Apakah pendekatan baru atau inovatif digunakan dalam strategi SPBE?'],
            ['indikator_id' => 1, 'level' => 5, 'pertanyaan' => 'Apakah proses strategi ditingkatkan secara berkelanjutan?'],

            // Indikator 33 (indikator_id = 2)
            ['indikator_id' => 2, 'level' => 1, 'pertanyaan' => 'Apakah proses penyusunan dan penggunaan arsitektur layanan SPBE telah dilakukan?'],
            ['indikator_id' => 2, 'level' => 2, 'pertanyaan' => 'Apakah keberhasilan arsitektur layanan SPBE dimonitor?'],
            ['indikator_id' => 2, 'level' => 2, 'pertanyaan' => 'Apakah dokumen arsitektur dan komponennya dikelola dengan baik?'],
            ['indikator_id' => 2, 'level' => 3, 'pertanyaan' => 'Apakah proses penyusunan arsitektur didefinisikan secara formal?'],
            ['indikator_id' => 2, 'level' => 3, 'pertanyaan' => 'Proses pengelolaan arsitektur enterprise telah diterapkan di seluruh bidang di Kominfo?'],
            ['indikator_id' => 2, 'level' => 4, 'pertanyaan' => 'Apakah proses pengelolaan arsitektur layanan diukur secara sistematis?'],
            ['indikator_id' => 2, 'level' => 4, 'pertanyaan' => 'Apakah ada mekanisme kontrol dalam pelaksanaan arsitektur layanan?'],
            ['indikator_id' => 2, 'level' => 5, 'pertanyaan' => 'Apakah pendekatan baru diterapkan dalam pengelolaan arsitektur layanan?'],
            ['indikator_id' => 2, 'level' => 5, 'pertanyaan' => 'Apakah proses arsitektur layanan ditingkatkan secara berkelanjutan?'],

            // Indikator 34 (indikator_id = 3)
            ['indikator_id' => 3, 'level' => 1, 'pertanyaan' => 'Apakah proses pengelolaan anggaran dan biaya SPBE telah dilakukan?'],
            ['indikator_id' => 3, 'level' => 2, 'pertanyaan' => 'Apakah pelaksanaan anggaran SPBE dipantau secara berkala?'],
            ['indikator_id' => 3, 'level' => 2, 'pertanyaan' => 'Apakah pengelolaan anggaran SPBE terdokumentasi?'],
            ['indikator_id' => 3, 'level' => 3, 'pertanyaan' => 'Apakah proses pengelolaan anggaran dan biaya SPBE ditetapkan secara formal?'],
            ['indikator_id' => 3, 'level' => 4, 'pertanyaan' => 'Apakah efektivitas pengelolaan anggaran dan biaya SPBE diukur secara berkala?'],
            ['indikator_id' => 3, 'level' => 5, 'pertanyaan' => 'Apakah dilakukan perbaikan berkelanjutan terhadap pengelolaan anggaran dan biaya SPBE?'],

            // Indikator 35 (indikator_id = 4)
            ['indikator_id' => 4, 'level' => 1, 'pertanyaan' => 'Apakah pengadaan barang dan jasa SPBE dilakukan sesuai dengan ketentuan?'],
            ['indikator_id' => 4, 'level' => 2, 'pertanyaan' => 'Apakah pelaksanaan pengadaan dipantau dan terdokumentasi?'],
            ['indikator_id' => 4, 'level' => 3, 'pertanyaan' => 'Apakah proses pengadaan SPBE ditetapkan secara formal?'],
            ['indikator_id' => 4, 'level' => 4, 'pertanyaan' => 'Apakah kinerja proses pengadaan diukur dan dikendalikan?'],
            ['indikator_id' => 4, 'level' => 5, 'pertanyaan' => 'Apakah proses pengadaan dikembangkan secara berkelanjutan?'],

            // Indikator 36 (indikator_id = 5)
            ['indikator_id' => 5, 'level' => 1, 'pertanyaan' => 'Apakah manajemen SDM SPBE dilakukan sesuai kompetensi dan kebutuhan layanan?'],
            ['indikator_id' => 5, 'level' => 2, 'pertanyaan' => 'Apakah pelaksanaan manajemen SDM dipantau dan terdokumentasi?'],
            ['indikator_id' => 5, 'level' => 3, 'pertanyaan' => 'Apakah proses manajemen SDM ditetapkan secara formal?'],
            ['indikator_id' => 5, 'level' => 4, 'pertanyaan' => 'Apakah efektivitas manajemen SDM SPBE diukur?'],
            ['indikator_id' => 5, 'level' => 5, 'pertanyaan' => 'Apakah dilakukan peningkatan berkelanjutan terhadap manajemen SDM SPBE?'],

            // Indikator 37 (indikator_id = 6)
            ['indikator_id' => 6, 'level' => 1, 'pertanyaan' => 'Apakah layanan kearsipan dinamis SPBE telah dilaksanakan?'],
            ['indikator_id' => 6, 'level' => 2, 'pertanyaan' => 'Apakah pelaksanaan layanan kearsipan dinamis dipantau dan terdokumentasi?'],
            ['indikator_id' => 6, 'level' => 3, 'pertanyaan' => 'Apakah proses layanan kearsipan dinamis ditetapkan secara formal?'],
            ['indikator_id' => 6, 'level' => 4, 'pertanyaan' => 'Apakah efektivitas layanan kearsipan dinamis diukur dan dikendalikan?'],
            ['indikator_id' => 6, 'level' => 5, 'pertanyaan' => 'Apakah proses layanan kearsipan dinamis ditingkatkan secara berkelanjutan?'],

            // Indikator 38 (indikator_id = 7)
            ['indikator_id' => 7, 'level' => 1, 'pertanyaan' => 'Apakah pengelolaan Barang Milik Negara/Daerah dalam SPBE telah dilakukan?'],
            ['indikator_id' => 7, 'level' => 2, 'pertanyaan' => 'Apakah pengelolaan tersebut dipantau dan terdokumentasi?'],
            ['indikator_id' => 7, 'level' => 3, 'pertanyaan' => 'Apakah proses pengelolaan BMN/BMD ditetapkan secara formal?'],
            ['indikator_id' => 7, 'level' => 4, 'pertanyaan' => 'Apakah efektivitas pengelolaan BMN/BMD diukur secara berkala?'],
            ['indikator_id' => 7, 'level' => 5, 'pertanyaan' => 'Apakah pengelolaan BMN/BMD dikembangkan secara berkelanjutan?'],

            // Indikator 39 (indikator_id = 8)
            ['indikator_id' => 8, 'level' => 1, 'pertanyaan' => 'Apakah layanan pengawasan internal dalam SPBE telah dilakukan?'],
            ['indikator_id' => 8, 'level' => 2, 'pertanyaan' => 'Apakah pelaksanaan pengawasan internal dipantau dan terdokumentasi?'],
            ['indikator_id' => 8, 'level' => 3, 'pertanyaan' => 'Apakah proses pengawasan internal ditetapkan secara formal?'],
            ['indikator_id' => 8, 'level' => 4, 'pertanyaan' => 'Apakah kinerja pengawasan internal diukur dan dikendalikan?'],
            ['indikator_id' => 8, 'level' => 5, 'pertanyaan' => 'Apakah proses pengawasan internal ditingkatkan secara berkelanjutan?'],

            // Indikator 40 (indikator_id = 9)
            ['indikator_id' => 9, 'level' => 1, 'pertanyaan' => 'Apakah layanan akuntabilitas kinerja organisasi SPBE telah dilaksanakan?'],
            ['indikator_id' => 9, 'level' => 2, 'pertanyaan' => 'Apakah layanan akuntabilitas dipantau dan terdokumentasi?'],
            ['indikator_id' => 9, 'level' => 3, 'pertanyaan' => 'Apakah proses akuntabilitas ditetapkan secara formal?'],
            ['indikator_id' => 9, 'level' => 4, 'pertanyaan' => 'Apakah efektivitas proses akuntabilitas diukur?'],
            ['indikator_id' => 9, 'level' => 5, 'pertanyaan' => 'Apakah proses akuntabilitas dikembangkan secara berkelanjutan?'],

            // Indikator 41 (indikator_id = 10)
            ['indikator_id' => 10, 'level' => 1, 'pertanyaan' => 'Apakah layanan kinerja pegawai dalam SPBE telah dilaksanakan?'],
            ['indikator_id' => 10, 'level' => 2, 'pertanyaan' => 'Apakah pelaksanaan layanan kinerja pegawai dipantau dan terdokumentasi?'],
            ['indikator_id' => 10, 'level' => 3, 'pertanyaan' => 'Apakah proses layanan kinerja pegawai ditetapkan secara formal?'],
            ['indikator_id' => 10, 'level' => 4, 'pertanyaan' => 'Apakah efektivitas layanan kinerja pegawai diukur?'],
            ['indikator_id' => 10, 'level' => 5, 'pertanyaan' => 'Apakah layanan kinerja pegawai dikembangkan secara berkelanjutan?'],

            // Indikator 42 (indikator_id = 11)
            ['indikator_id' => 11, 'level' => 1, 'pertanyaan' => 'Apakah layanan pengaduan pelayanan SPBE telah tersedia dan dapat digunakan oleh pengguna?'],
            ['indikator_id' => 11, 'level' => 2, 'pertanyaan' => 'Apakah layanan pengaduan dipantau dan terdokumentasi?'],
            ['indikator_id' => 11, 'level' => 3, 'pertanyaan' => 'Apakah proses layanan pengaduan ditetapkan secara formal?'],
            ['indikator_id' => 11, 'level' => 4, 'pertanyaan' => 'Apakah efektivitas layanan pengaduan diukur dan dikendalikan?'],
            ['indikator_id' => 11, 'level' => 5, 'pertanyaan' => 'Apakah layanan pengaduan ditingkatkan secara berkelanjutan?'],

            // Indikator 43 (indikator_id = 12)
            ['indikator_id' => 12, 'level' => 1, 'pertanyaan' => 'Apakah layanan data terbuka telah disediakan dan diakses publik?'],
            ['indikator_id' => 12, 'level' => 2, 'pertanyaan' => 'Apakah layanan data terbuka dipantau dan terdokumentasi?'],
            ['indikator_id' => 12, 'level' => 3, 'pertanyaan' => 'Apakah proses penyediaan data terbuka ditetapkan secara formal?'],
            ['indikator_id' => 12, 'level' => 4, 'pertanyaan' => 'Apakah efektivitas layanan data terbuka diukur dan dikendalikan?'],
            ['indikator_id' => 12, 'level' => 5, 'pertanyaan' => 'Apakah layanan data terbuka ditingkatkan secara berkelanjutan?'],

            // Indikator 44 (indikator_id = 13)
            ['indikator_id' => 13, 'level' => 1, 'pertanyaan' => 'Apakah layanan JDIH telah tersedia dan diakses publik?'],
            ['indikator_id' => 13, 'level' => 2, 'pertanyaan' => 'Apakah layanan JDIH dipantau dan terdokumentasi?'],
            ['indikator_id' => 13, 'level' => 3, 'pertanyaan' => 'Apakah proses layanan JDIH ditetapkan secara formal?'],
            ['indikator_id' => 13, 'level' => 4, 'pertanyaan' => 'Apakah efektivitas layanan JDIH diukur dan dikendalikan?'],
            ['indikator_id' => 13, 'level' => 5, 'pertanyaan' => 'Apakah layanan JDIH ditingkatkan secara berkelanjutan?'],

            // Indikator 45 (indikator_id = 14)
            ['indikator_id' => 14, 'level' => 1, 'pertanyaan' => 'Apakah layanan publik sektor 1 tersedia secara elektronik?'],
            ['indikator_id' => 14, 'level' => 2, 'pertanyaan' => 'Apakah layanan publik sektor 1 dipantau dan terdokumentasi?'],
            ['indikator_id' => 14, 'level' => 3, 'pertanyaan' => 'Apakah proses layanan publik sektor 1 ditetapkan secara formal?'],
            ['indikator_id' => 14, 'level' => 4, 'pertanyaan' => 'Apakah efektivitas layanan publik sektor 1 diukur dan dikendalikan?'],
            ['indikator_id' => 14, 'level' => 5, 'pertanyaan' => 'Apakah layanan publik sektor 1 ditingkatkan secara berkelanjutan?'],

            // Indikator 46 (indikator_id = 15)
            ['indikator_id' => 15, 'level' => 1, 'pertanyaan' => 'Apakah layanan publik sektor 2 tersedia secara elektronik?'],
            ['indikator_id' => 15, 'level' => 2, 'pertanyaan' => 'Apakah layanan publik sektor 2 dipantau dan terdokumentasi?'],
            ['indikator_id' => 15, 'level' => 3, 'pertanyaan' => 'Apakah proses layanan publik sektor 2 ditetapkan secara formal?'],
            ['indikator_id' => 15, 'level' => 4, 'pertanyaan' => 'Apakah efektivitas layanan publik sektor 2 diukur dan dikendalikan?'],
            ['indikator_id' => 15, 'level' => 5, 'pertanyaan' => 'Apakah layanan publik sektor 2 ditingkatkan secara berkelanjutan?'],

            // Indikator 47 (indikator_id = 16)
            ['indikator_id' => 16, 'level' => 1, 'pertanyaan' => 'Apakah sistem pengendalian internal SPBE telah diterapkan?'],
            ['indikator_id' => 16, 'level' => 2, 'pertanyaan' => 'Apakah pelaksanaan pengendalian internal dipantau dan terdokumentasi?'],
            ['indikator_id' => 16, 'level' => 3, 'pertanyaan' => 'Apakah proses pengendalian internal ditetapkan secara formal?'],
            ['indikator_id' => 16, 'level' => 4, 'pertanyaan' => 'Apakah efektivitas sistem pengendalian internal diukur dan dikendalikan?'],
            ['indikator_id' => 16, 'level' => 5, 'pertanyaan' => 'Apakah sistem pengendalian internal ditingkatkan secara berkelanjutan?']
        ]);
    }
}
