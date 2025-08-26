<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // Menampilkan daftar kelas
    public function index()
    {
        $kelases = Kelas::all();
        return view('kelas.index', compact('kelases'));
    }

    // Menampilkan form tambah kelas
    public function create()
    {
        return view('kelas.create');
    }

    // Menyimpan data kelas
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'Description'=> 'required|string|max:255'
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'description'=> $request->description
        ]);

        return redirect('/kelas')->with('success', 'Kelas berhasil ditambahkan');
    }

    // Menghapus data kelas
    public function destroy($id)
    {
        $dataKelas = Kelas::find($id);

        if ($dataKelas) {
            $dataKelas->delete();
            return redirect('/kelas')->with('success', 'Kelas berhasil dihapus');
        }

        return redirect('/kelas')->with('error', 'Kelas tidak ditemukan');
    }

    // Menampilkan detail kelas
    public function show($id)
    {
        $dataKelas = Kelas::find($id);
    
        if (!$dataKelas) {
            return redirect('/kelas')->with('error', 'Kelas tidak ditemukan');
        }
    
        return view('kelas.show', compact('dataKelas'));
    }
    

    // Menampilkan form edit kelas
    public function edit($id)
    {
        $dataKelas = Kelas::find($id);

        if (!$dataKelas) {
            return redirect('/kelas')->with('error', 'Kelas tidak ditemukan');
        }

        return view('kelas.edit', compact('dataKelas'));
    }

    // Update data kelas
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'description'=> 'required|string|max:255'
        ]);

        $dataKelas = Kelas::find($id);

        if (!$dataKelas) {
            return redirect('/kelas')->with('error', 'Kelas tidak ditemukan');
        }

        $dataKelas->update([
            'nama_kelas' => $request->nama_kelas,
            'description'    => $request->jurusan
        ]);

        return redirect('/kelas')->with('success', 'Kelas berhasil diperbarui');
    }
}
