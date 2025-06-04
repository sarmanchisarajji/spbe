<?php

namespace App\Http\Controllers;
use App\Models\IndikatorSPBE;

use Illuminate\Http\Request;    

class PenilaianController extends Controller
{
    public function indexPenilaian($id)
    {
        $aplikasi = IndikatorSPBE::all();
        return view('pages.penilaian', [
            'aplikasis' => $aplikasi,
        ]);
    }
}
