<?php

namespace App\Http\Controllers;

use App\Models\IndikatorSPBE;
use App\Models\Pertanyaan;
use \Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;


class IndikatorController extends Controller
{
public function indexPenilaian($id)
{
    // Ambil semua data indikator
    $aplikasi = IndikatorSPBE::all();

    // Ambil data evaluasi berdasarkan ID
    $evaluasi = DB::table('evaluasis')->where('id', $id)->first();

    // Ambil rata-rata per indikator_id dan level
    $dataCobit = DB::table('cobits')
        ->select(
            'indikator_id',
            'level',
            DB::raw('AVG(CASE WHEN nilai IN ("F", "L") THEN 1 ELSE 0 END) as rata_level')
        )
        ->where('evaluasi_id', $id)
        ->groupBy('indikator_id', 'level')
        ->get();

    // Buat array untuk simpan rata-rata per indikator
    $indikatorRataRata = [];

    // Susun data per indikator_id
    foreach ($dataCobit as $row) {
        $indikatorId = $row->indikator_id;
        $level = $row->level;
        $rataLevel = $row->rata_level;

        if (!isset($indikatorRataRata[$indikatorId])) {
            $indikatorRataRata[$indikatorId] = [
                'jumlah_rata' => 0,
                'jumlah_level' => 0,
            ];
        }

        $indikatorRataRata[$indikatorId]['jumlah_rata'] += $rataLevel;
        $indikatorRataRata[$indikatorId]['jumlah_level']++;
    }

    // Hitung rata-rata akhir untuk tiap indikator
    foreach ($aplikasi as $item) {
        if (isset($indikatorRataRata[$item->id])) {
            $total = $indikatorRataRata[$item->id]['jumlah_rata'];
            $jumlahLevel = $indikatorRataRata[$item->id]['jumlah_level'];
            $finalAverage = $total / $jumlahLevel;
            $item->hasil = round($finalAverage * 100, 2); // persen
        } else {
            $item->hasil = null; // atau 0
        }
    }

    return view('pages.penilaian', compact('aplikasi', 'evaluasi'));
}

}
