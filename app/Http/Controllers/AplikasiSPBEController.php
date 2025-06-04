<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use Illuminate\Http\Request;

class AplikasiSPBEController extends Controller
{
    public function indexSPBE()
    {
        $aplikasi = Evaluasi::all();
        return view('pages.apk', [
            'aplikasis' => $aplikasi,
        ]);
    }

    public function storeAplikasi(Request $request)
    {
        $request->validate([
            'nama_aplikasi' => 'required',
            'deskripsi' => 'required',
        ]);

        Evaluasi::create([
            'nama_aplikasi' => $request->nama_aplikasi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->back()->with('success', 'Data aplikasi berhasil ditambahkan.');
    }

    public function updateAplikasi(Request $request, $id)
    {
        $request->validate([
            'nama_aplikasi' => 'required',
            'deskripsi' => 'required',
        ]);

        $aplikasi = Evaluasi::findOrFail($id);
        $aplikasi->update([
            'nama_aplikasi' => $request->nama_aplikasi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->back()->with('success', 'Data aplikasi berhasil diperbarui.');
    }

    public function destroyAplikasi($id)
    {
        $aplikasi = Evaluasi::findOrFail($id);
        $aplikasi->delete();

        return redirect()->back()->with('success', 'Data aplikasi berhasil dihapus.');
    }
}
