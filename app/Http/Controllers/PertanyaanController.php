<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Log;

class PertanyaanController extends Controller
{
    public function indexPertanyaan($evaluasi_id, $indikator_id)
    {
        // Cek apakah sudah ada jawaban sebelumnya di tabel cobits
        $jawaban = DB::table('cobits')
            ->where('evaluasi_id', $evaluasi_id)
            ->where('indikator_id', $indikator_id)
            ->get()
            ->keyBy('pertanyaan_id');

        // Ambil semua pertanyaan
        $pertanyaans = DB::table('pertanyaans')
            ->where('indikator_id', $indikator_id)
            ->orderBy('level') // penting agar pengurutan level benar
            ->get();

        // Ambil nama indikator
        $indikator = DB::table('indikator_s_p_b_e_s')->where('id', $indikator_id)->first();
        $indikator = (array) $indikator;

        // ========== LOGIKA TAMBAHAN UNTUK CEK LEVEL ==========

        $levelStatus = [];
        foreach ($pertanyaans as $pt) {
            $jwb = $jawaban[$pt->id] ?? null;
            $levelStatus[$pt->level][] = $jwb;
        }

        $lastCompletedLevel = 0;
        $disableFromLevel = null;

        foreach ($levelStatus as $level => $listJawaban) {
            $semuaTerisi = collect($listJawaban)->every(function ($jawab) {
                return $jawab && $jawab->nilai !== null;
            });

            $semuaN = collect($listJawaban)->every(function ($jawab) {
                return $jawab && $jawab->nilai === 'N';
            });

            if ($semuaTerisi) {
                $lastCompletedLevel = $level;
                if ($semuaN) {
                    $disableFromLevel = $level + 1;
                    break;
                }
            } else {
                break;
            }
        }

        $aplikasi = Evaluasi::findOrFail($evaluasi_id);
        $namaAplikasi = $aplikasi->nama_aplikasi;

        // Kirim semua variabel ke view
        return view('pages.pertanyaan', [
            'pertanyaans' => $pertanyaans,
            'indikator' => $indikator,
            'jawaban' => $jawaban,
            'evaluasi_id' => $evaluasi_id,
            'namaAplikasi' => $namaAplikasi,
            'lastCompletedLevel' => $lastCompletedLevel,
            'disableFromLevel' => $disableFromLevel,
        ]);
    }
    public function updateJawaban(Request $request)
    {

        $request->validate([
            'evaluasi_id'    => 'required|exists:evaluasis,id',
            'indikator_id'   => 'required|exists:indikator_s_p_b_e_s,id',
            'pertanyaan_id'  => 'required|exists:pertanyaans,id',
            'nilai'          => 'required|in:F,L,P,N', // Validasi score enum
            'ada'            => 'required|in:IYA,TIDAK',     // Validasi ketersediaan enum
            'catatan'        => 'nullable|string',
            'lampiran'       => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        $data = [
            'evaluasi_id'   => $request->evaluasi_id,
            'indikator_id'  => $request->indikator_id,
            'pertanyaan_id' => $request->pertanyaan_id,
            'nilai'         => $request->nilai,
            'ada'           => $request->ada,
            'catatan'       => $request->catatan,
            'updated_at'    => now(),
        ];


        // Simpan file jika ada lampiran
        if ($request->hasFile('lampiran')) {
            Log::info('Lampiran terdeteksi: ' . $request->file('lampiran')->getClientOriginalName());
            $data['bukti_pendukung'] = $request->file('lampiran')->store('bukti', 'public');
        }



        // Simpan atau update berdasarkan kombinasi unique
        DB::table('cobits')->updateOrInsert(
            [
                'evaluasi_id'   => $request->evaluasi_id,
                'indikator_id'  => $request->indikator_id,
                'pertanyaan_id' => $request->pertanyaan_id,
            ],
            $data
        );
        // Jika jawaban terakhir adalah "TIDAK" dan "N", isi otomatis pertanyaan di atasnya
        if ($request->ada === 'TIDAK' && $request->nilai === 'N') {
            // Ambil level pertanyaan sekarang
            $currentPertanyaan = DB::table('pertanyaans')->where('id', $request->pertanyaan_id)->first();

            if ($currentPertanyaan) {
                $currentLevel = $currentPertanyaan->level;

                // Ambil semua pertanyaan level di atasnya
                $nextPertanyaans = DB::table('pertanyaans')
                    ->where('indikator_id', $request->indikator_id)
                    ->where('level', '>', $currentLevel)
                    ->get();

                foreach ($nextPertanyaans as $p) {
                    DB::table('cobits')->updateOrInsert(
                        [
                            'evaluasi_id'   => $request->evaluasi_id,
                            'indikator_id'  => $request->indikator_id,
                            'pertanyaan_id' => $p->id,
                        ],
                        [
                            'evaluasi_id'   => $request->evaluasi_id,
                            'indikator_id'  => $request->indikator_id,
                            'pertanyaan_id' => $p->id,
                            'ada'           => 'TIDAK',
                            'nilai'         => 'N',
                            'catatan'       => 'Tidak ada Catatan',
                            'bukti_pendukung' => null,
                            'updated_at'    => now(),
                        ]
                    );
                }
            }
        }


        return back()->with('success', 'Jawaban berhasil disimpan atau diperbarui.');
    }
}
