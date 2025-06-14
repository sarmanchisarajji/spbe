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

}
