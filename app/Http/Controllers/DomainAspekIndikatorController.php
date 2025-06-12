<?php

namespace App\Http\Controllers;

use App\Models\IndikatorSPBE;
use Illuminate\Http\Request;

class DomainAspekIndikatorController extends Controller
{
    public function tampilAspekIndikator()
    {
        $aspekIndikator = IndikatorSPBE::with('aspek')->get()->groupBy('aspek.nama_aspek');

        // dd($aspekIndikator);

        return view('pages.domain-layanan', [
            'aspekIndikators' => $aspekIndikator,
        ]);
    }
}
