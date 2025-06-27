<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MyProfileController extends Controller
{
    public function indexProfile()
    {
        $user = Auth::user();
        return view('pages.myprofile', compact('user'));
    }

    public function updateDataProfile(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:15',
        ]);

        $user = Auth::user();

        // Update data tanpa mengubah role
        $user->update([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->back()->with('success', 'Data profil berhasil diperbarui.');
    }

    public function updateFotoProfile(Request $request)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        // Upload foto jika ada perubahan
        if ($request->hasFile('foto')) {
            if ($user->foto) {
                Storage::delete(str_replace('storage/', 'public/', $user->foto));
            }
            $fotoPath = $request->file('foto')->store('public/karyawan');
            $fotoPath = str_replace('public/', 'storage/', $fotoPath);
        } else {
            $fotoPath = $user->foto; // Gunakan foto lama jika tidak ada perubahan
        }

        // Update data tanpa mengubah role
        $user->update([
            'foto' => $fotoPath,
        ]);

        return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
    }
}
