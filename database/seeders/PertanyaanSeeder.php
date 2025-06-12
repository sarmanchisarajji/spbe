<?php

namespace Database\Seeders;

use App\Models\Pertanyaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pertanyaans = [
            // Indikator 32 (indikator_id = 1)
            ['indikator_id' => 1, 'level' => 1, 'atribut_proses' => 'PA 1.1 (Practice Performance)', 'pertanyaan' => 'Apakah proses perencanaan strategis SPBE telah dilakukan dan menghasilkan output?'],
            ['indikator_id' => 1, 'level' => 2, 'atribut_proses' => 'PA 2.1 (Performance Management)', 'pertanyaan' => 'Apakah kinerja dari strategi SPBE dipantau?'],
            ['indikator_id' => 1, 'level' => 2, 'atribut_proses' => 'PA 2.2 (Work Product Management)', 'pertanyaan' => 'Apakah dokumen perencanaan dan pelaksanaan SPBE terdokumentasi dan dikelola?'],
            ['indikator_id' => 1, 'level' => 3, 'atribut_proses' => 'PA 3.1 (Process Definition)', 'pertanyaan' => 'Apakah proses perencanaan SPBE ditetapkan secara formal?'],
            ['indikator_id' => 1, 'level' => 3, 'atribut_proses' => 'PA 3.2 (Proses Deployment)', 'pertanyaan' => 'Apakah proses pengelolaan strategi TI telah diterapkan di seluruh bidang di Kominfo?'],
            ['indikator_id' => 1, 'level' => 4, 'atribut_proses' => 'PA 4.1 (Process Measurement)', 'pertanyaan' => 'Apakah efektivitas proses strategi diukur dengan indikator yang jelas?'],
            ['indikator_id' => 1, 'level' => 4, 'atribut_proses' => 'PA 4.2 (Process Control)', 'pertanyaan' => 'Apakah terdapat mekanisme pengendalian terhadap pelaksanaan strategi?'],
            ['indikator_id' => 1, 'level' => 5, 'atribut_proses' => 'PA 5.1 (Process Innovation)', 'pertanyaan' => 'Apakah pendekatan baru atau inovatif digunakan dalam strategi SPBE?'],
            ['indikator_id' => 1, 'level' => 5, 'atribut_proses' => 'PA 5.2 (Process Optimization)', 'pertanyaan' => 'Apakah proses strategi ditingkatkan secara berkelanjutan?'],

            // Indikator 33 (indikator_id = 2)
            ['indikator_id' => 2, 'level' => 1, 'atribut_proses' => 'PA 1.1 (Practice Performance)', 'pertanyaan' => 'Apakah proses penyusunan dan penggunaan arsitektur layanan SPBE telah dilakukan?'],
            ['indikator_id' => 2, 'level' => 2, 'atribut_proses' => 'PA 2.1 (Performance Management)', 'pertanyaan' => 'Apakah keberhasilan arsitektur layanan SPBE dimonitor?'],
            ['indikator_id' => 2, 'level' => 2, 'atribut_proses' => 'PA 2.2 (Work Product Management)', 'pertanyaan' => 'Apakah dokumen arsitektur dan komponennya dikelola dengan baik?'],
            ['indikator_id' => 2, 'level' => 3, 'atribut_proses' => 'PA 3.1 (Process Definition)', 'pertanyaan' => 'Apakah proses penyusunan arsitektur didefinisikan secara formal?'],
            ['indikator_id' => 2, 'level' => 3, 'atribut_proses' => 'PA 3.2 (Proses Deployment)', 'pertanyaan' => 'Proses pengelolaan arsitektur enterprise telah diterapkan di seluruh bidang di Kominfo?'],
            ['indikator_id' => 2, 'level' => 4, 'atribut_proses' => 'PA 4.1 (Process Measurement)', 'pertanyaan' => 'Apakah proses pengelolaan arsitektur layanan diukur secara sistematis?'],
            ['indikator_id' => 2, 'level' => 4, 'atribut_proses' => 'PA 4.2 (Process Control)', 'pertanyaan' => 'Apakah ada mekanisme kontrol dalam pelaksanaan arsitektur layanan?'],
            ['indikator_id' => 2, 'level' => 5, 'atribut_proses' => 'PA 5.1 (Process Innovation)', 'pertanyaan' => 'Apakah pendekatan baru diterapkan dalam pengelolaan arsitektur layanan?'],
            ['indikator_id' => 2, 'level' => 5, 'atribut_proses' => 'PA 5.2 (Process Optimization)', 'pertanyaan' => 'Apakah proses arsitektur layanan ditingkatkan secara berkelanjutan?'],

            // Indikator 34 (indikator_id = 3)
            ['indikator_id' => 3, 'level' => 1, 'atribut_proses' => 'PA 1.1 (Practice Performance)', 'pertanyaan' => 'Apakah pengelolaan aset layanan SPBE dilakukan secara nyata dan aktif?'],
            ['indikator_id' => 3, 'level' => 2, 'atribut_proses' => 'PA 2.1 (Performance Management)', 'pertanyaan' => 'Apakah kinerja pengelolaan aset dimonitor secara terukur?'],
            ['indikator_id' => 3, 'level' => 2, 'atribut_proses' => 'PA 2.2 (Work Product Management)', 'pertanyaan' => 'Apakah data dan dokumentasi aset dikelola dan tersedia?'],
            ['indikator_id' => 3, 'level' => 3, 'atribut_proses' => 'PA 3.1 (Process Definition)', 'pertanyaan' => 'Apakah terdapat SOP atau kebijakan formal terkait manajemen aset SPBE?'],
            ['indikator_id' => 3, 'level' => 3, 'atribut_proses' => 'PA 3.2 (Proses Deployment)', 'pertanyaan' => 'Apakah proses pengelolaan anggaran dan biaya TI telah diterapkan di seluruh bidang di Kominfo?'],
            ['indikator_id' => 3, 'level' => 4, 'atribut_proses' => 'PA 4.1 (Process Measurement)', 'pertanyaan' => 'Apakah proses manajemen aset diukur efektivitas dan efisiensinya?'],
            ['indikator_id' => 3, 'level' => 4, 'atribut_proses' => 'PA 4.2 (Process Control)', 'pertanyaan' => 'Apakah proses pengelolaan aset dikendalikan untuk mencegah penyimpangan?'],
            ['indikator_id' => 3, 'level' => 5, 'atribut_proses' => 'PA 5.1 (Process Innovation)', 'pertanyaan' => 'Apakah terdapat pendekatan inovatif dalam manajemen aset layanan?'],
            ['indikator_id' => 3, 'level' => 5, 'atribut_proses' => 'PA 5.2 (Process Optimization)', 'pertanyaan' => 'Apakah proses manajemen aset terus ditingkatkan?'],

            // Indikator 35 (indikator_id = 4)
            ['indikator_id' => 4, 'level' => 1, 'atribut_proses' => 'PA 1.1 (Practice Performance)', 'pertanyaan' => 'Apakah proses pengelolaan risiko SPBE telah dilakukan secara nyata?'],
            ['indikator_id' => 4, 'level' => 2, 'atribut_proses' => 'PA 2.1 (Performance Management)', 'pertanyaan' => 'Apakah kinerja manajemen risiko dipantau secara berkala?'],
            ['indikator_id' => 4, 'level' => 2, 'atribut_proses' => 'PA 2.2 (Work Product Management)', 'pertanyaan' => 'Apakah dokumentasi risiko tersedia dan dikelola dengan baik?'],
            ['indikator_id' => 4, 'level' => 3, 'atribut_proses' => 'PA 3.1 (Process Definition)', 'pertanyaan' => 'Apakah terdapat prosedur formal untuk pengelolaan risiko SPBE?'],
            ['indikator_id' => 4, 'level' => 3, 'atribut_proses' => 'PA 3.2 (Proses Deployment)', 'pertanyaan' => 'Apakah proses pengelolaan pemasok telah diterapkan di seluruh bidang di Kominfo?'],
            ['indikator_id' => 4, 'level' => 4, 'atribut_proses' => 'PA 4.1 (Process Measurement)', 'pertanyaan' => 'Apakah proses manajemen risiko SPBE diukur efektivitasnya?'],
            ['indikator_id' => 4, 'level' => 4, 'atribut_proses' => 'PA 4.2 (Process Control)', 'pertanyaan' => 'Apakah ada mekanisme pengendalian terhadap risiko SPBE?'],
            ['indikator_id' => 4, 'level' => 5, 'atribut_proses' => 'PA 5.1 (Process Innovation)', 'pertanyaan' => 'Apakah metode inovatif digunakan dalam manajemen risiko SPBE?'],
            ['indikator_id' => 4, 'level' => 5, 'atribut_proses' => 'PA 5.2 (Process Optimization)', 'pertanyaan' => 'Apakah proses manajemen risiko SPBE terus ditingkatkan?'],

            // Indikator 36 (indikator_id = 5)
            ['indikator_id' => 5, 'level' => 1, 'atribut_proses' => 'PA 1.1 (Practice Performance)', 'pertanyaan' => 'Apakah pengelolaan SDM SPBE dilakukan dan menghasilkan output nyata?'],
            ['indikator_id' => 5, 'level' => 2, 'atribut_proses' => 'PA 2.1 (Performance Management)', 'pertanyaan' => 'Apakah kinerja SDM SPBE dimonitor dan dievaluasi?'],
            ['indikator_id' => 5, 'level' => 2, 'atribut_proses' => 'PA 2.2 (Work Product Management)', 'pertanyaan' => 'Apakah dokumentasi SDM SPBE dikelola dengan baik?'],
            ['indikator_id' => 5, 'level' => 3, 'atribut_proses' => 'PA 3.1 (Process Definition)', 'pertanyaan' => 'Apakah ada kebijakan dan prosedur formal pengelolaan SDM SPBE?'],
            ['indikator_id' => 5, 'level' => 3, 'atribut_proses' => 'PA 3.2 (Proses Deployment)', 'pertanyaan' => 'Apakah proses pengelolaan SDM TI telah diterapkan di seluruh bidang di Kominfo?'],
            ['indikator_id' => 5, 'level' => 4, 'atribut_proses' => 'PA 4.1 (Process Measurement)', 'pertanyaan' => 'Apakah proses pengelolaan SDM SPBE dievaluasi efektivitasnya?'],
            ['indikator_id' => 5, 'level' => 4, 'atribut_proses' => 'PA 4.2 (Process Control)', 'pertanyaan' => 'Apakah terdapat pengendalian terhadap kompetensi dan penempatan SDM SPBE?'],
            ['indikator_id' => 5, 'level' => 5, 'atribut_proses' => 'PA 5.1 (Process Innovation)', 'pertanyaan' => 'Apakah pendekatan baru diterapkan dalam manajemen SDM TIK/SPBE?'],
            ['indikator_id' => 5, 'level' => 5, 'atribut_proses' => 'PA 5.2 (Process Optimization)', 'pertanyaan' => 'Apakah manajemen SDM SPBE ditingkatkan secara berkelanjutan?'],

            // Indikator 37 (indikator_id = 6)
            ['indikator_id' => 6, 'level' => 1, 'atribut_proses' => 'PA 1.1 (Practice Performance)', 'pertanyaan' => 'Apakah pengoperasian layanan SPBE telah dilaksanakan secara aktif dan konsisten?'],
            ['indikator_id' => 6, 'level' => 2, 'atribut_proses' => 'PA 2.1 (Performance Management)', 'pertanyaan' => 'Apakah kinerja layanan SPBE dipantau secara berkala?'],
            ['indikator_id' => 6, 'level' => 2, 'atribut_proses' => 'PA 2.2 (Work Product Management)', 'pertanyaan' => 'Apakah dokumen pendukung operasional dikelola dengan baik?'],
            ['indikator_id' => 6, 'level' => 3, 'atribut_proses' => 'PA 3.1 (Process Definition)', 'pertanyaan' => 'Apakah terdapat prosedur formal dan terdokumentasi untuk pengoperasian layanan SPBE?'],
            ['indikator_id' => 6, 'level' => 3, 'atribut_proses' => 'PA 3.2 (Proses Deployment)', 'pertanyaan' => 'Apakah proses pengelolaan operasi TI diterapkan di seluruh bidang di Kominfo?'],
            ['indikator_id' => 6, 'level' => 4, 'atribut_proses' => 'PA 4.1 (Process Measurement)', 'pertanyaan' => 'Apakah efektivitas proses operasional layanan diukur dan dianalisis?'],
            ['indikator_id' => 6, 'level' => 4, 'atribut_proses' => 'PA 4.2 (Process Control)', 'pertanyaan' => 'Apakah terdapat pengendalian dalam operasional layanan?'],
            ['indikator_id' => 6, 'level' => 5, 'atribut_proses' => 'PA 5.1 (Process Innovation)', 'pertanyaan' => 'Apakah pendekatan inovatif diterapkan untuk meningkatkan operasional SPBE?'],
            ['indikator_id' => 6, 'level' => 5, 'atribut_proses' => 'PA 5.2 (Process Optimization)', 'pertanyaan' => 'Apakah proses operasional layanan terus diperbaiki?'],

            // Indikator 38 (indikator_id = 7)
            ['indikator_id' => 7, 'level' => 1, 'atribut_proses' => 'PA 1.1 (Practice Performance)', 'pertanyaan' => 'Apakah proses pemantauan layanan SPBE sudah berjalan dan memberikan hasil?'],
            ['indikator_id' => 7, 'level' => 2, 'atribut_proses' => 'PA 2.1 (Performance Management)', 'pertanyaan' => 'Apakah kinerja pemantauan dan evaluasi layanan SPBE dipantau secara terukur?'],
            ['indikator_id' => 7, 'level' => 2, 'atribut_proses' => 'PA 2.2 (Work Product Management)', 'pertanyaan' => 'Apakah dokumentasi hasil pemantauan dan evaluasi dikelola dengan baik?'],
            ['indikator_id' => 7, 'level' => 3, 'atribut_proses' => 'PA 3.1 (Process Definition)', 'pertanyaan' => 'Apakah proses pemantauan dan evaluasi didefinisikan secara formal?'],
            ['indikator_id' => 7, 'level' => 3, 'atribut_proses' => 'PA 3.2 (Proses Deployment)', 'pertanyaan' => 'Apakah proses pengelolaan operasi TI sudah diterapkan di seluruh bidang di Kominfo?'],
            ['indikator_id' => 7, 'level' => 4, 'atribut_proses' => 'PA 4.1 (Process Measurement)', 'pertanyaan' => 'Apakah efektivitas proses pemantauan dan evaluasi diukur?'],
            ['indikator_id' => 7, 'level' => 4, 'atribut_proses' => 'PA 4.2 (Process Control)', 'pertanyaan' => 'Apakah ada pengendalian dalam proses evaluasi dan monitoring?'],
            ['indikator_id' => 7, 'level' => 5, 'atribut_proses' => 'PA 5.1 (Process Innovation)', 'pertanyaan' => 'Apakah metode inovatif digunakan dalam pemantauan layanan SPBE?'],
            ['indikator_id' => 7, 'level' => 5, 'atribut_proses' => 'PA 5.2 (Process Optimization)', 'pertanyaan' => 'Apakah proses pemantauan dan evaluasi layanan terus diperbaiki?'],

            // Indikator 39 (indikator_id = 8)
            ['indikator_id' => 8, 'level' => 1, 'atribut_proses' => 'PA 1.1 (Practice Performance)', 'pertanyaan' => 'Apakah kegiatan audit dan kepatuhan SPBE telah dilaksanakan secara aktif?'],
            ['indikator_id' => 8, 'level' => 2, 'atribut_proses' => 'PA 2.1 (Performance Management)', 'pertanyaan' => 'Apakah kinerja kepatuhan SPBE dimonitor secara terukur?'],
            ['indikator_id' => 8, 'level' => 2, 'atribut_proses' => 'PA 2.2 (Work Product Management)', 'pertanyaan' => 'Apakah dokumen hasil audit dan evaluasi disimpan dan dikelola dengan baik?'],
            ['indikator_id' => 8, 'level' => 3, 'atribut_proses' => 'PA 3.1 (Process Definition)', 'pertanyaan' => 'Apakah prosedur audit dan evaluasi kepatuhan SPBE sudah didefinisikan?'],
            ['indikator_id' => 8, 'level' => 3, 'atribut_proses' => 'PA 3.2 (Proses Deployment)', 'pertanyaan' => 'Apakah proses pemantauan kepatuhan terhadap regulasi eksternal telah diterapkan di seluruh bidang?'],
            ['indikator_id' => 8, 'level' => 4, 'atribut_proses' => 'PA 4.1 (Process Measurement)', 'pertanyaan' => 'Apakah efektivitas audit dan evaluasi kepatuhan SPBE diukur?'],
            ['indikator_id' => 8, 'level' => 4, 'atribut_proses' => 'PA 4.2 (Process Control)', 'pertanyaan' => 'Apakah ada mekanisme pengendalian untuk memastikan tindak lanjut audit?'],
            ['indikator_id' => 8, 'level' => 5, 'atribut_proses' => 'PA 5.1 (Process Innovation)', 'pertanyaan' => 'Apakah pendekatan modern digunakan dalam audit SPBE?'],
            ['indikator_id' => 8, 'level' => 5, 'atribut_proses' => 'PA 5.2 (Process Optimization)', 'pertanyaan' => 'Apakah proses audit dan evaluasi kepatuhan SPBE terus diperbaiki?'],

            // Indikator 40 (indikator_id = 9)
            ['indikator_id' => 9, 'level' => 1, 'atribut_proses' => 'PA 1.1 (Practice Performance)', 'pertanyaan' => 'Apakah evaluasi kinerja SPBE dilakukan dan menghasilkan laporan nyata?'],
            ['indikator_id' => 9, 'level' => 2, 'atribut_proses' => 'PA 2.1 (Performance Management)', 'pertanyaan' => 'Apakah kinerja SPBE dimonitor menggunakan indikator yang terukur dan valid?'],
            ['indikator_id' => 9, 'level' => 2, 'atribut_proses' => 'PA 2.2 (Work Product Management)', 'pertanyaan' => 'Apakah dokumen hasil monitoring dan evaluasi dikelola dengan baik?'],
            ['indikator_id' => 9, 'level' => 3, 'atribut_proses' => 'PA 3.1 (Process Definition)', 'pertanyaan' => 'Apakah proses evaluasi dan monitoring SPBE didefinisikan secara formal?'],
            ['indikator_id' => 9, 'level' => 3, 'atribut_proses' => 'PA 3.2 (Proses Deployment)', 'pertanyaan' => 'Apakah proses pemantauan dan evaluasi kinerja serta kepatuhan telah diterapkan di seluruh bidang di Kominfo?'],
            ['indikator_id' => 9, 'level' => 4, 'atribut_proses' => 'PA 4.1 (Process Measurement)', 'pertanyaan' => 'Apakah efektivitas proses evaluasi SPBE diukur?'],
            ['indikator_id' => 9, 'level' => 4, 'atribut_proses' => 'PA 4.2 (Process Control)', 'pertanyaan' => 'Apakah terdapat pengendalian terhadap pelaksanaan evaluasi SPBE?'],
            ['indikator_id' => 9, 'level' => 5, 'atribut_proses' => 'PA 5.1 (Process Innovation)', 'pertanyaan' => 'Apakah pendekatan baru diterapkan dalam evaluasi kinerja SPBE?'],
            ['indikator_id' => 9, 'level' => 5, 'atribut_proses' => 'PA 5.2 (Process Optimization)', 'pertanyaan' => 'Apakah proses evaluasi dan monitoring ditingkatkan secara berkelanjutan?'],

            // Indikator 41 (indikator_id = 10)
            ['indikator_id' => 10, 'level' => 1, 'atribut_proses' => 'PA 1.1 (Practice Performance)', 'pertanyaan' => 'Apakah evaluasi keamanan SPBE telah dilakukan secara aktif dan terdokumentasi?'],
            ['indikator_id' => 10, 'level' => 2, 'atribut_proses' => 'PA 2.1 (Performance Management)', 'pertanyaan' => 'Apakah efektivitas sistem keamanan SPBE dipantau dan dievaluasi?'],
            ['indikator_id' => 10, 'level' => 2, 'atribut_proses' => 'PA 2.2 (Work Product Management)', 'pertanyaan' => 'Apakah dokumentasi hasil pemantauan keamanan dikelola dengan baik?'],
            ['indikator_id' => 10, 'level' => 3, 'atribut_proses' => 'PA 3.1 (Process Definition)', 'pertanyaan' => 'Apakah ada kebijakan dan SOP formal untuk evaluasi keamanan SPBE?'],
            ['indikator_id' => 10, 'level' => 3, 'atribut_proses' => 'PA 3.2 (Proses Deployment)', 'pertanyaan' => 'Apakah proses pengelolaan SDM TI telah diterapkan di seluruh bidang?'],
            ['indikator_id' => 10, 'level' => 4, 'atribut_proses' => 'PA 4.1 (Process Measurement)', 'pertanyaan' => 'Apakah proses keamanan SPBE dievaluasi efektivitasnya?'],
            ['indikator_id' => 10, 'level' => 4, 'atribut_proses' => 'PA 4.2 (Process Control)', 'pertanyaan' => 'Apakah ada mekanisme pengendalian terhadap hasil evaluasi keamanan?'],
            ['indikator_id' => 10, 'level' => 5, 'atribut_proses' => 'PA 5.1 (Process Innovation)', 'pertanyaan' => 'Apakah pendekatan baru digunakan dalam evaluasi dan penguatan keamanan SPBE?'],
            ['indikator_id' => 10, 'level' => 5, 'atribut_proses' => 'PA 5.2 (Process Optimization)', 'pertanyaan' => 'Apakah evaluasi keamanan SPBE terus diperbaiki secara berkala?'],

            // Indikator 42 (indikator_id = 11)
            ['indikator_id' => 11, 'level' => 1, 'atribut_proses' => 'PA 1.1 (Practice Performance)', 'pertanyaan' => 'Apakah pengelolaan keamanan informasi dan kelangsungan SPBE dilakukan nyata?'],
            ['indikator_id' => 11, 'level' => 2, 'atribut_proses' => 'PA 2.1 (Performance Management)', 'pertanyaan' => 'Apakah efektivitas manajemen keamanan dan kontinuitas layanan dimonitor?'],
            ['indikator_id' => 11, 'level' => 2, 'atribut_proses' => 'PA 2.2 (Work Product Management)', 'pertanyaan' => 'Apakah dokumentasi keamanan dan kelangsungan layanan dikelola baik?'],
            ['indikator_id' => 11, 'level' => 3, 'atribut_proses' => 'PA 3.1 (Process Definition)', 'pertanyaan' => 'Apakah prosedur keamanan dan pemulihan terdokumentasi secara formal?'],
            ['indikator_id' => 11, 'level' => 3, 'atribut_proses' => 'PA 3.2 (Proses Deployment)', 'pertanyaan' => 'Apakah proses manajemen kontinuitas TI diterapkan di seluruh bidang Kominfo?'],
            ['indikator_id' => 11, 'level' => 4, 'atribut_proses' => 'PA 4.1 (Process Measurement)', 'pertanyaan' => 'Apakah proses keamanan dan kelangsungan SPBE dievaluasi efektivitasnya?'],
            ['indikator_id' => 11, 'level' => 4, 'atribut_proses' => 'PA 4.2 (Process Control)', 'pertanyaan' => 'Apakah terdapat mekanisme kontrol terhadap risiko keamanan dan gangguan layanan?'],
            ['indikator_id' => 11, 'level' => 5, 'atribut_proses' => 'PA 5.1 (Process Innovation)', 'pertanyaan' => 'Apakah pendekatan baru diterapkan dalam manajemen keamanan dan kelangsungan?'],
            ['indikator_id' => 11, 'level' => 5, 'atribut_proses' => 'PA 5.2 (Process Optimization)', 'pertanyaan' => 'Apakah proses ini ditingkatkan secara berkelanjutan?'],

            // Indikator 43 (indikator_id = 12)
            ['indikator_id' => 12, 'level' => 1, 'atribut_proses' => 'PA 1.1 (Practice Performance)', 'pertanyaan' => 'Apakah layanan insiden SPBE dijalankan secara nyata dan terdokumentasi?'],
            ['indikator_id' => 12, 'level' => 2, 'atribut_proses' => 'PA 2.1 (Performance Management)', 'pertanyaan' => 'Apakah efektivitas penanganan insiden SPBE dimonitor secara berkala?'],
            ['indikator_id' => 12, 'level' => 2, 'atribut_proses' => 'PA 2.2 (Work Product Management)', 'pertanyaan' => 'Apakah dokumentasi dan log insiden dikelola dengan baik?'],
            ['indikator_id' => 12, 'level' => 3, 'atribut_proses' => 'PA 3.1 (Process Definition)', 'pertanyaan' => 'Apakah ada SOP formal untuk penanganan insiden keamanan SPBE?'],
            ['indikator_id' => 12, 'level' => 3, 'atribut_proses' => 'PA 3.2 (Proses Deployment)', 'pertanyaan' => 'Apakah proses pengelolaan layanan keamanan TI diterapkan di seluruh bidang?'],
            ['indikator_id' => 12, 'level' => 4, 'atribut_proses' => 'PA 4.1 (Process Measurement)', 'pertanyaan' => 'Apakah proses manajemen insiden dievaluasi efektivitasnya?'],
            ['indikator_id' => 12, 'level' => 4, 'atribut_proses' => 'PA 4.2 (Process Control)', 'pertanyaan' => 'Apakah ada kontrol terhadap insiden dan pemulihan layanan SPBE?'],
            ['indikator_id' => 12, 'level' => 5, 'atribut_proses' => 'PA 5.1 (Process Innovation)', 'pertanyaan' => 'Apakah pendekatan baru digunakan dalam penanganan insiden SPBE?'],
            ['indikator_id' => 12, 'level' => 5, 'atribut_proses' => 'PA 5.2 (Process Optimization)', 'pertanyaan' => 'Apakah proses penanganan insiden terus ditingkatkan?'],

            // Indikator 44 (indikator_id = 13)
            ['indikator_id' => 13, 'level' => 1, 'atribut_proses' => 'PA 1.1 (Practice Performance)', 'pertanyaan' => 'Apakah layanan insiden SPBE dijalankan secara nyata dan terdokumentasi?'],
            ['indikator_id' => 13, 'level' => 2, 'atribut_proses' => 'PA 2.1 (Performance Management)', 'pertanyaan' => 'Apakah efektivitas penanganan insiden SPBE dimonitor secara berkala?'],
            ['indikator_id' => 13, 'level' => 2, 'atribut_proses' => 'PA 2.2 (Work Product Management)', 'pertanyaan' => 'Apakah dokumentasi dan log insiden dikelola dengan baik?'],
            ['indikator_id' => 13, 'level' => 3, 'atribut_proses' => 'PA 3.1 (Process Definition)', 'pertanyaan' => 'Apakah ada SOP formal untuk penanganan insiden keamanan SPBE?'],
            ['indikator_id' => 13, 'level' => 3, 'atribut_proses' => 'PA 3.2 (Proses Deployment)', 'pertanyaan' => 'Apakah proses pengelolaan operasi telah diterapkan di seluruh bidang?'],
            ['indikator_id' => 13, 'level' => 4, 'atribut_proses' => 'PA 4.1 (Process Measurement)', 'pertanyaan' => 'Apakah proses manajemen insiden dievaluasi efektivitasnya?'],
            ['indikator_id' => 13, 'level' => 4, 'atribut_proses' => 'PA 4.2 (Process Control)', 'pertanyaan' => 'Apakah ada kontrol terhadap insiden dan pemulihan layanan SPBE?'],
            ['indikator_id' => 13, 'level' => 5, 'atribut_proses' => 'PA 5.1 (Process Innovation)', 'pertanyaan' => 'Apakah pendekatan baru digunakan dalam penanganan insiden SPBE?'],
            ['indikator_id' => 13, 'level' => 5, 'atribut_proses' => 'PA 5.2 (Process Optimization)', 'pertanyaan' => 'Apakah proses penanganan insiden terus ditingkatkan?'],

            // Indikator 45 (indikator_id = 14)
            ['indikator_id' => 14, 'level' => 1, 'atribut_proses' => 'PA 1.1 (Practice Performance)', 'pertanyaan' => 'Apakah layanan jaringan intra pemerintah telah dikelola secara nyata?'],
            ['indikator_id' => 14, 'level' => 2, 'atribut_proses' => 'PA 2.1 (Performance Management)', 'pertanyaan' => 'Apakah performa penanganan insiden dan permintaan layanan dipantau?'],
            ['indikator_id' => 14, 'level' => 2, 'atribut_proses' => 'PA 2.2 (Work Product Management)', 'pertanyaan' => 'Apakah dokumentasi insiden dan permintaan layanan dikelola dengan baik?'],
            ['indikator_id' => 14, 'level' => 3, 'atribut_proses' => 'PA 3.1 (Process Definition)', 'pertanyaan' => 'Apakah ada SOP formal untuk pengelolaan insiden jaringan intra pemerintah?'],
            ['indikator_id' => 14, 'level' => 3, 'atribut_proses' => 'PA 3.2 (Proses Deployment)', 'pertanyaan' => 'Apakah proses penanganan permintaan layanan dan insiden diterapkan di seluruh bidang Kominfo?'],
            ['indikator_id' => 14, 'level' => 4, 'atribut_proses' => 'PA 4.1 (Process Measurement)', 'pertanyaan' => 'Apakah efektivitas penanganan insiden dievaluasi secara terukur?'],
            ['indikator_id' => 14, 'level' => 4, 'atribut_proses' => 'PA 4.2 (Process Control)', 'pertanyaan' => 'Apakah ada pengendalian terhadap eskalasi dan penanganan insiden?'],
            ['indikator_id' => 14, 'level' => 5, 'atribut_proses' => 'PA 5.1 (Process Innovation)', 'pertanyaan' => 'Apakah pendekatan baru digunakan dalam pengelolaan layanan jaringan SPBE?'],
            ['indikator_id' => 14, 'level' => 5, 'atribut_proses' => 'PA 5.2 (Process Optimization)', 'pertanyaan' => 'Apakah proses pengelolaan insiden ditingkatkan secara berkelanjutan?'],

            // Indikator 46 (indikator_id = 15)
            ['indikator_id' => 15, 'level' => 1, 'atribut_proses' => 'PA 1.1 (Practice Performance)', 'pertanyaan' => 'Apakah pengelolaan masalah aplikasi SPBE dilakukan secara nyata?'],
            ['indikator_id' => 15, 'level' => 2, 'atribut_proses' => 'PA 2.1 (Performance Management)', 'pertanyaan' => 'Apakah efektivitas pengelolaan masalah aplikasi dimonitor secara berkala?'],
            ['indikator_id' => 15, 'level' => 2, 'atribut_proses' => 'PA 2.2 (Work Product Management)', 'pertanyaan' => 'Apakah dokumentasi masalah dan solusinya tersedia dan dikelola dengan baik?'],
            ['indikator_id' => 15, 'level' => 3, 'atribut_proses' => 'PA 3.1 (Process Definition)', 'pertanyaan' => 'Apakah terdapat SOP atau prosedur formal untuk manajemen masalah aplikasi?'],
            ['indikator_id' => 15, 'level' => 3, 'atribut_proses' => 'PA 3.2 (Proses Deployment)', 'pertanyaan' => 'Apakah proses manajemen masalah diterapkan di seluruh bidang Kominfo?'],
            ['indikator_id' => 15, 'level' => 4, 'atribut_proses' => 'PA 4.1 (Process Measurement)', 'pertanyaan' => 'Apakah efektivitas proses penyelesaian masalah aplikasi dievaluasi?'],
            ['indikator_id' => 15, 'level' => 4, 'atribut_proses' => 'PA 4.2 (Process Control)', 'pertanyaan' => 'Apakah ada kontrol untuk mencegah terulangnya masalah aplikasi yang sama?'],
            ['indikator_id' => 15, 'level' => 5, 'atribut_proses' => 'PA 5.1 (Process Innovation)', 'pertanyaan' => 'Apakah digunakan pendekatan baru dalam pengelolaan masalah aplikasi?'],
            ['indikator_id' => 15, 'level' => 5, 'atribut_proses' => 'PA 5.2 (Process Optimization)', 'pertanyaan' => 'Apakah pengelolaan masalah aplikasi ditingkatkan secara berkelanjutan?'],

            // Indikator 47 (indikator_id = 16)
            ['indikator_id' => 16, 'level' => 1, 'atribut_proses' => 'PA 1.1 (Practice Performance)', 'pertanyaan' => 'Apakah Kominfo secara rutin melakukan aktivitas monitoring dan evaluasi pengendalian internal? '],
            ['indikator_id' => 16, 'level' => 2, 'atribut_proses' => 'PA 2.1 (Performance Management)', 'pertanyaan' => 'Apakah Kominfo mengelola dan memantau kinerja proses monitoring dan evaluasi pengendalian internal?'],
            ['indikator_id' => 16, 'level' => 2, 'atribut_proses' => 'PA 2.2 (Work Product Management)', 'pertanyaan' => 'Apakah Kominfo secara sistematis mengukur hasil dan efektivitas pengendalian internal?'],
            ['indikator_id' => 16, 'level' => 3, 'atribut_proses' => 'PA 3.1 (Process Definition)', 'pertanyaan' => 'Apakah proses monitoring dan evaluasi pengendalian internal sudah terdokumentasi secara lengkap?'],
            ['indikator_id' => 16, 'level' => 3, 'atribut_proses' => 'PA 3.2 (Proses Deployment)', 'pertanyaan' => 'Apakah proses monitoring dan evaluasi pengendalian internal telah diterapkan secara menyeluruh di seluruh bidang?'],
            ['indikator_id' => 16, 'level' => 4, 'atribut_proses' => 'PA 4.1 (Process Measurement)', 'pertanyaan' => 'Apakah Kominfo menggunakan metrik untuk mengukur efektivitas proses monitoring dan evaluasi secara berkelanjutan?'],
            ['indikator_id' => 16, 'level' => 4, 'atribut_proses' => 'PA 4.2 (Process Control)', 'pertanyaan' => 'Apakah ada kontrol untuk memantau evaluasi dan menilai sistem pengendalian internal?'],
            ['indikator_id' => 16, 'level' => 5, 'atribut_proses' => 'PA 5.1 (Process Innovation)', 'pertanyaan' => 'Apakah Kominfo menerapkan inovasi atau metode baru dalam proses monitoring dan evaluasi pengendalian internal?'],
            ['indikator_id' => 16, 'level' => 5, 'atribut_proses' => 'PA 5.2 (Process Optimization)', 'pertanyaan' => 'Apakah pengelolaan masalah aplikasi ditingkatkan secara berkelanjutan?'],
        ];

        foreach ($pertanyaans as $prty) {
            Pertanyaan::create($prty);
        }
    }
}
