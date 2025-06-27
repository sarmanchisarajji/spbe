<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function indexUser()
    {
        $karyawan = User::all()->where('role', 'level2');

        return view('pages.user', [
            'karyawans' => $karyawan
        ]);
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:15',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'required|string|min:6',
        ]);

        // Upload foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/karyawan');
            $fotoPath = str_replace('public/', 'storage/', $fotoPath);
        }

        User::create([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'role' => 'level2', // Default role sebagai "karyawan"
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'foto' => $fotoPath,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'Data user berhasil ditambahkan!');
    }

    public function updateUser(Request $request, $id)
    {
        $karyawan = User::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:15',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'nullable|string|min:6',
        ]);

        // Upload foto jika ada perubahan
        if ($request->hasFile('foto')) {
            if ($karyawan->foto) {
                Storage::delete(str_replace('storage/', 'public/', $karyawan->foto));
            }
            $fotoPath = $request->file('foto')->store('public/karyawan');
            $fotoPath = str_replace('public/', 'storage/', $fotoPath);
        } else {
            $fotoPath = $karyawan->foto; // Gunakan foto lama jika tidak ada perubahan
        }

        // Update data karyawan
        $karyawan->update([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'foto' => $fotoPath,
            'password' => $request->password ? bcrypt($request->password) : $karyawan->password,
        ]);

        return redirect()->back()->with('success', 'Data user berhasil diperbarui!');
    }


    public function destroyUser($id)
    {
        $karyawan = User::findOrFail($id);

        // Hapus foto jika ada
        if ($karyawan->foto) {
            Storage::delete(str_replace('storage/', 'public/', $karyawan->foto));
        }

        $karyawan->delete();

        return redirect()->back()->with('success', 'Data user berhasil dihapus!');
    }
}
