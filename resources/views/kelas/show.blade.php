{{--memanggil atau menhubungkan dengan file app--}}
@extends('Layouts.app')
@section('title', 'Detail siswa')
@section()
@section('content')

     <h1>Detail Kelas</h1>
     
     <p><b>Nama:</b> {{ $dataKelas->nama_kelas }}</p>
     <p><b>Deskripsi:</b> {{ $dataKelas->deskripsi }}</p>

     <a href="{{ route('kelas.index') }}">Kembali</a>
@endsection