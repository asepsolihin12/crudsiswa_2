<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Clas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    // Menampilkan daftar siswa
    public function index()
    {
        $siswas = User::all();
        return view('siswa.index', compact('siswas'));
    }

    // Menampilkan form tambah siswa
    public function create()
    {
        $clases = Clas::all();
        return view('siswa.create', compact('clases'));
    }

    // Menyimpan data siswa
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'kelas_id'      => 'required',
            'nisn'          => 'required|unique:users,nisn',
            'alamat'        => 'required',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required',
            'no_handphone'  => 'required|unique:users,no_handphone',
            'photo'         => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload gambar ke storage/public/profilesiswa
        $photoPath = $request->file('photo')->store('profilesiswa', 'public');

        $datasiswa_store = [
            'clas_id'       => $request->kelas_id, // Pastikan kolom ini sesuai database
            'name'          => $request->name,
            'photo'         => $photoPath,
            'nisn'          => $request->nisn,
            'alamat'        => $request->alamat,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'no_handphone'  => $request->no_handphone
        ];

        User::create($datasiswa_store);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
    }

    // Menghapus data siswa
    public function destroy($id)
    {
        $datasiswa = User::find($id);

        if ($datasiswa != null) {
            Storage::disk('public')->delete($datasiswa->photo);
            $datasiswa->delete();
        }

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }

    // Menampilkan detail siswa
    public function show($id)
    {
        //cari data user di database berdasarkan id user
        $datauser = User::find($id);
        
        //cek apakah datanya ada atau tidak 
        if ($datauser == null) {
            return redirect('/');
        }

        //kembalikan user ke halaman show dan kirimkan data user yang di ambi berdasarkan id
        return view('siswa.show', compact('datauser'));
    }
}
