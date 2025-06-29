<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evaluasi;
use App\Models\AspekSPBE;
use Illuminate\Http\Request;
use App\Models\IndikatorSPBE;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function indexDashboard()
    {
        $aspek = AspekSPBE::count();
        $indikator = IndikatorSPBE::count();
        $apkSPBE = Evaluasi::count();
        $karyawan = User::where('role', 'level2')->count();

        // Ambil data berdasarkan tahun penilaian terbaru
        $latestEvaluasi = Evaluasi::orderByDesc('tahun_penilaian')->first();
        $latestYear = $latestEvaluasi?->tahun_penilaian;

        $kematanganSaatIni = Evaluasi::where('tahun_penilaian', $latestYear)->avg('tingkat_kematangan');

        $levelKematanganSaatIni = Evaluasi::where('tahun_penilaian', $latestYear)
            ->select('level_kematangan')
            ->groupBy('level_kematangan')
            ->orderByRaw('COUNT(*) DESC')
            ->value('level_kematangan');

        // Target kematangan
        $kematanganDiharapkan = 5.0;
        $selisih = $kematanganDiharapkan - $kematanganSaatIni;

        $levelKematanganDiharapkan = 5.0;
        $selisihLevel = $levelKematanganDiharapkan - (int) filter_var($levelKematanganSaatIni, FILTER_SANITIZE_NUMBER_INT);

        // Data grafik berdasarkan tahun_penilaian, bukan updated_at
        $grafikData = DB::table('evaluasis')
            ->select('tahun_penilaian as tahun', 'level_kematangan')
            ->groupBy('tahun_penilaian', 'level_kematangan')
            ->orderBy('tahun_penilaian')
            ->get()
            ->map(function ($item) {
                $item->level_kematangan_angka = (int) filter_var($item->level_kematangan, FILTER_SANITIZE_NUMBER_INT);
                return $item;
            });


        return view('pages.index', compact(
            'aspek',
            'indikator',
            'apkSPBE',
            'karyawan',
            'latestYear',
            'kematanganSaatIni',
            'kematanganDiharapkan',
            'selisih',
            'levelKematanganSaatIni',
            'levelKematanganDiharapkan',
            'selisihLevel',
            'grafikData'
        ));
    }
}
