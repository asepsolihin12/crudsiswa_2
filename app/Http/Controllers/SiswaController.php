<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class SiswaController extends Controller
{ 
    //fungsi untuk mengarahkan ke halaman index:sisa
    public function index(){
        return view('siswa.index');
    }

    // fungsi untuk mengarahkan ke halaman create:siswa
    public function create(){
        return view('siswa.create');
    }

    //untuk store data siswa
    public function store(Request $request){
        // validasi data
        $request->validate([
            'name'           => 'required',
            'nisn'           => 'required | unique:users,nisn',
            'alamat'         => 'required',
            'email'          => 'required | unique:users,email',
            'password'       => 'required',
            'no_handphone'   => 'required | unique:users,no_handphone'
        ]);
        
        //siapkan data yang akan di masukan 
        $datasiswa_store = [
            'clas_id' => $request->kelas_id,
            'name' => $request->name,
            'photo' => 'foto.jpg',
            'nisn' => $request->nisn,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => $request->password,
            'no_handphone' => $request->no_handphone
        ];
            
        
        //masukan data ke dalam tabel user
        User::create($datasiswa_store);

        //arahkan user ke halaman home
        return redirect('/')->with('success', 'Data siswa berhasil ditambahkan');

    }
}
    




