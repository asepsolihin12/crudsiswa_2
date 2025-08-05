<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Clas; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Tambahkan untuk enkripsi password

class SiswaController extends Controller
{ 
    // Fungsi untuk mengarahkan ke halaman index siswa
    public function index(){
        return view('siswa.index');
    }

    // Fungsi untuk mengarahkan ke halaman create siswa
    public function create(){
        $clases = Clas::all(); 
        return view('siswa.create', compact('clases'));
    }

    // Fungsi untuk menyimpan data siswa
    public function store(Request $request){
        // Validasi data
        $request->validate([
            'name'           => 'required',
            'nisn'           => 'required|unique:users,nisn',
            'alamat'         => 'required',
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required',
            'no_handphone'   => 'required|unique:users,no_handphone',
            'photo'          => 'required|image|mimes:jpeg,png,jpg,gif',
            'kelas_id'       => 'required|exists:clases,id'
        ]);

        // Upload gambar terlebih dahulu
        $photoPath = $request->file('photo')->store('profilesiswa', 'public');

        // Siapkan data yang akan dimasukkan
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

        // Masukkan data ke dalam tabel users
        User::create($datasiswa_store);

        // Arahkan ke halaman home dengan pesan sukses
        return redirect('/')->with('success', 'Data siswa berhasil ditambahkan');
    }
}
