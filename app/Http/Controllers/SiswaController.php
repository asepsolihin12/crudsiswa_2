<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class SiswaController extends Controller
{
    
    public function store(Request $request){
        // validasi data
        $request->validate([
            'name'           => 'required',
            'nisn'           => 'required',
            'alamat'         => 'required',
            'email'          => 'required',
            'password'       => 'required',
            'no_handphone'   => 'required'
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
        User::create(datasiswa_store);

        //arahkan user ke halaman home
        return redirect('/')->with('success', 'Data siswa berhasil ditambahkan');

    }
}
    




