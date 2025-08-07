<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Clas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    // Fungsi untuk menampilkan daftar siswa
    public function index()
    {
        $siswas = User::all();
        return view('siswa.index', compact('siswas'));
    }

    // Fungsi untuk menampilkan form tambah siswa
    public function create()
    {
        $clases = Clas::all();
        return view('siswa.create', compact('clases'));
    }

    // Fungsi untuk menyimpan data siswa
    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required',
            'kelas_id'       => 'required',
            'nisn'           => 'required|unique:users,nisn',
            'alamat'         => 'required',
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required',
            'no_handphone'   => 'required|unique:users,no_handphone',
            'photo'          => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Upload gambar ke storage/public/profilesiswa
        $photoPath = $request->file('photo')->store('profilesiswa', 'public');

        $datasiswa_store = [
            'clas_id'       => $request->kelas_id,
            'name'          => $request->name,
            'photo'         => $photoPath,
            'nisn'          => $request->nisn,
            'alamat'        => $request->alamat,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'no_handphone'  => $request->no_handphone
        ];

        User::create($datasiswa_store);

        return redirect('/')->with('success', 'Data siswa berhasil ditambahkan');
    }

    // Fungsi untuk menghapus data siswa
    public function destroy($id)
    {
        $datasiswa = User::find($id);

        if ($datasiswa != null) {
            // Hapus file foto dari storage
            Storage::disk('public')->delete($datasiswa->photo);

            // Hapus data user dari database
            
            $datasiswa->delete();
        }

        return redirect('/')->with('success', 'Data siswa berhasil dihapus');
    }
}
