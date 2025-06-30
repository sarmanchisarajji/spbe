<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class AplikasiSPBEController extends Controller
{
public function indexSPBE()
{
    // Ambil semua data evaluasi (aplikasi)
    $aplikasiList = Evaluasi::all();

    foreach ($aplikasiList as $apk) {

        // STEP 1 - Ambil nilai rata-rata per indikator per level
        $dataCobit = DB::table('cobits')
            ->select(
                'indikator_id',
                'level',
                DB::raw('AVG(CASE WHEN nilai IN ("F", "L") THEN 1 ELSE 0 END) as rata_level')
            )
            ->where('evaluasi_id', $apk->id)
            ->groupBy('indikator_id', 'level')
            ->get();

        // Siapkan array untuk menyimpan rata-rata per indikator
        $indikatorRataRata = [];

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

        // STEP 2 - Hitung rata-rata final setiap indikator
        $indikatorFinalAverages = [];
        foreach ($indikatorRataRata as $indikatorId => $data) {
            $total = $data['jumlah_rata'];
            $jumlahLevel = $data['jumlah_level'];
            $finalAverage = $jumlahLevel > 0 ? $total / $jumlahLevel : 0;
            $indikatorFinalAverages[$indikatorId] = $finalAverage;
        }

        // STEP 3 - Hitung rata-rata keseluruhan dari semua indikator
        $totalIndikator = count($indikatorFinalAverages);
        $sumAllIndikators = array_sum($indikatorFinalAverages);

        // Sesuai ketentuanmu, dibagi 16 indikator
        $hasilKematangan = 16 > 0
            ? round(($sumAllIndikators / 16) * 100, 2)
            : 0;
        // dd($sumAllIndikators);

        // Tentukan level kematangan
        $level = match (true) {
            $hasilKematangan == 0 => 'Level 0',
            $hasilKematangan <= 20 => 'Level 1',
            $hasilKematangan <= 40 => 'Level 2',
            $hasilKematangan <= 60 => 'Level 3',
            $hasilKematangan <= 80 => 'Level 4',
            default => 'Level 5',
        };

        // Update ke tabel evaluasis
        DB::table('evaluasis')
            ->where('id', $apk->id)
            ->update([
                'tingkat_kematangan' => $hasilKematangan,
                'level_kematangan' => $level,
                'updated_at' => now(),
            ]);

        // Simpan ke object untuk view
        $apk->hasil_kematangan = $hasilKematangan;
        $apk->level_kematangan = $level;
    }

    return view('pages.apk', [
        'aplikasis' => $aplikasiList,
    ]);
}


    public function storeAplikasi(Request $request)
    {
        $request->validate([
            'nama_aplikasi' => 'required',
            'deskripsi' => 'required',
            'tahun_penilaian' => 'required|integer|min:2000|max:' . (date('Y') + 1),
        ]);

        Evaluasi::create([
            'nama_aplikasi' => $request->nama_aplikasi,
            'deskripsi' => $request->deskripsi,
            'tahun_penilaian' => $request->tahun_penilaian,
        ]);

        return redirect()->back()->with('success', 'Data aplikasi berhasil ditambahkan.');
    }

    public function updateAplikasi(Request $request, $id)
    {
        $request->validate([
            'nama_aplikasi' => 'required',
            'deskripsi' => 'required',
            'tahun_penilaian' => 'required|integer|min:2000|max:' . (date('Y') + 1),
        ]);

        $aplikasi = Evaluasi::findOrFail($id);
        $aplikasi->update([
            'nama_aplikasi' => $request->nama_aplikasi,
            'deskripsi' => $request->deskripsi,
            'tahun_penilaian' => $request->tahun_penilaian,
        ]);

        return redirect()->back()->with('success', 'Data aplikasi berhasil diperbarui.');
    }
    public function destroyAplikasi($id)
    {
        // Hapus semua data yang memiliki evaluasi_id = $id dari tabel cobits
        DB::table('cobits')->where('evaluasi_id', $id)->delete();
        $aplikasi = Evaluasi::findOrFail($id);
        $aplikasi->delete();

        return redirect()->back()->with('success', 'Data aplikasi berhasil dihapus.');
    }
}
