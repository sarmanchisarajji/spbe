<?php

namespace App\Http\Controllers;

use App\Models\AspekSPBE;
use App\Models\Evaluasi;
use App\Models\IndikatorSPBE;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexDashboard()
    {
        $aspek = AspekSPBE::all()->count();
        $indikator = IndikatorSPBE::all()->count();
        $apkSPBE = Evaluasi::all()->count();
        // $karyawan = User::all()->where('role', 'karyawan')->count();

        return view('pages.index', [
            'aspek' => $aspek,
            'indikator' => $indikator,
            'apkSPBE' => $apkSPBE,
            // 'karyawan' => $karyawan,
        ]);
    }
}
