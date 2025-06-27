<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evaluasi;
use App\Models\AspekSPBE;
use Illuminate\Http\Request;
use App\Models\IndikatorSPBE;

class DashboardController extends Controller
{
    public function indexDashboard()
    {
        $aspek = AspekSPBE::all()->count();
        $indikator = IndikatorSPBE::all()->count();
        $apkSPBE = Evaluasi::all()->count();
        $karyawan = User::all()->where('role', 'level2')->count();

        return view('pages.index', [
            'aspek' => $aspek,
            'indikator' => $indikator,
            'apkSPBE' => $apkSPBE,
            'karyawan' => $karyawan,
        ]);
    }
}
