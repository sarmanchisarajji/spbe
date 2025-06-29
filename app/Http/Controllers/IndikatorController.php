<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;


use App\Models\IndikatorSPBE;
use Barryvdh\DomPDF\Facade\Pdf;
use \Illuminate\Support\Facades\DB;


class IndikatorController extends Controller
{
    public function indexPenilaian($id)
    {
        // Ambil semua data indikator
        $aplikasi = IndikatorSPBE::all();

        // Ambil data evaluasi berdasarkan ID
        $evaluasi = DB::table('evaluasis')->where('id', $id)->first();

        // Ambil dan proses data cobits berdasarkan evaluasi_id dan indikator_id
        $dataCobit = DB::table('cobits')
            ->select('indikator_id', DB::raw('AVG(CASE WHEN nilai IN ("F", "L") THEN 1 ELSE 0 END) as rata_nilai'))
            ->where('evaluasi_id', $id)
            ->groupBy('indikator_id')
            ->get();

        // Tambahkan nilai hasil (dalam persen) ke dalam $aplikasi
        foreach ($aplikasi as $item) {
            $match = $dataCobit->firstWhere('indikator_id', $item->id);
            if ($match) {
                $item->hasil = round($match->rata_nilai * 100, 2); // dalam persen
            } else {
                $item->hasil = null; // atau 0 atau '-' tergantung kebutuhan tampilan
            }
        }

        return view('pages.penilaian', compact('aplikasi', 'evaluasi'));
    }

    public function exportPdf($id)
    {
        $evaluasi = Evaluasi::with([
            'cobit.pertanyaan',
            'cobit.indikator'
        ])->findOrFail($id);

        $grouped = $evaluasi->cobit->groupBy(function ($cobit) {
            return $cobit->indikator->nama_indikator ?? 'Indikator Tidak Diketahui';
        });

        return Pdf::loadView('pages.report', [
            'evaluasi' => $evaluasi,
            'groupedCobits' => $grouped,
        ])->stream("Laporan-SPBE-{$evaluasi->nama_aplikasi}.pdf");
    }
}
