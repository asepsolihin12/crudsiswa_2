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
        // siapkan data / panggil data kelas
        $clases = Clas::all();
        return view('siswa.create', compact('clases'));
    }

    // Menyimpan data siswa
    public function store(Request $request)
    {
        // validasi data
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
        $datauser = User::find($id);

        if ($datauser == null) {
            return redirect('/');
        }

        return view('siswa.show', compact('datauser'));
    }

    // Menampilkan form edit siswa
    public function edit($id)
    {
        $clases = Clas::all();
        $datauser = User::find($id);

        return view('siswa.edit', compact('clases', 'datauser'));
    }

    // Update data siswa
    public function update(Request $request, $id)
    {
        // validasi data
        $request->validate([
            'name'          => 'required',
            'kelas_id'      => 'required',
            'nisn'          => 'required',
            'alamat'        => 'required',
            'email'         => 'required|email',
            'no_handphone'  => 'required',
        ]);

        $datasiswa = User::find($id);


        $datasiswa_update = [
            'clas_id'       => $request->kelas_id,
            'name'          => $request->name,
            'nisn'          => $request->nisn,
            'alamat'        => $request->alamat,
            'email'         => $request->email,
            'no_handphone'  => $request->no_handphone
        ];

        //cek apakah user upload foto atau tidak
        if ($request->password != null) {
            $datasiswa_update['password'] = $request->password;
        }

         //cek apakah user upload foto atau tidak
         if ($request->hasFile('photo')) {
            // hapus foto lama
            Storage::disk('public')->delete($datasiswa->photo);

            // upload foto baru
            $datasiswa_update['photo'] = $request->file('photo')->store('profilesiswa', 'public');

        }

        $datasiswa->update($datasiswa_update);

        return redirect('/');
    }
}
