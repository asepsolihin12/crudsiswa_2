{{--memanggil atau menhubungkan dengan file app--}}
@extends('Layouts.app')
@section('title', 'edit kelas')
@section('content')

    <h1>Edit Kelas</h1>
<form action="/kelas/update/{{$dataKelas->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Nama Kelas:</label>
    <input type="text" name="nama_kelas" value="{{ $dataKelas->nama_kelas }}" required><br>
    <label>Jurusan:</label>
    <input type="text" name="jurusan" value="{{ $dataKelas->jurusan }}"><br>
    <button type="submit">Update</button>
    <a href="{{ route('kelas.index') }}">Kembali</a>
@endsection