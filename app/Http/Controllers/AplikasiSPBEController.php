<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class AplikasiSPBEController extends Controller
{
    public function indexSPBE()
    {
        // Ambil semua data evaluasi
        $aplikasi = Evaluasi::all();

        // Ambil data dari tabel cobits
        $dataCobits = DB::table('cobits')->get();

        // Proses perhitungan hasil_kematangan dan update tabel evaluasis
        foreach ($aplikasi as $apk) {
            // Filter data cobits berdasarkan evaluasi_id saat ini
            $filtered = $dataCobits->where('evaluasi_id', $apk->id);

            // Kelompokkan berdasarkan indikator_id
            $grouped = $filtered->groupBy('indikator_id');

            $totalPersen = 0;
            $jumlahIndikator = $grouped->count();

            foreach ($grouped as $indikatorId => $group) {
                // Konversi nilai F/L = 1, lainnya = 0
                $nilaiKonversi = $group->map(function ($item) {
                    return in_array($item->nilai, ['F', 'L']) ? 1 : 0;
                });

                // Hitung rata-rata dalam persen
                $avg = $nilaiKonversi->avg() * 100;
                $totalPersen += $avg;
            }

            // Hitung rata-rata keseluruhan dari seluruh indikator
            $hasilKematangan = $jumlahIndikator > 0 ? round($totalPersen / $jumlahIndikator, 2) : 0;

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

            // Tambahkan ke objek $aplikasi
            $apk->hasil_kematangan = $hasilKematangan;
            $apk->level_kematangan = $level;
        }

        return view('pages.apk', [
            'aplikasis' => $aplikasi,
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
