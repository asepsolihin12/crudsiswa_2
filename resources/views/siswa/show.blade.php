{{-- resources/views/siswa/show.blade.php --}}
@extends('layouts.app')
@section('title', 'Detail Siswa')

@section('content')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fdfbfb, #ebedee);
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .card {
            max-width: 500px;
            margin: 40px auto;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 25px;
            text-align: center;
        }

        .card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 4px solid #6c63ff;
        }

        .card h2 {
            font-size: 22px;
            margin: 10px 0 5px;
            color: #444;
        }

        .card p {
            font-size: 16px;
            margin: 6px 0;
            color: #666;
        }

        .btn-back {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 18px;
            background: #6c63ff;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-back:hover {
            background: #4b42c5;
        }
    </style>

    <div class="card">
        {{-- profile siswa --}}
        <img src="{{ asset('storage/'.$datauser->photo) }}" alt="Profile">

        {{-- nama siswa --}}
        <h2>{{ $datauser->name }}</h2>

        {{-- nisn siswa --}}
        <p><b>NISN:</b> {{ $datauser->nisn }}</p>

        {{-- alamat siswa --}}
        <p><b>Alamat:</b> {{ $datauser->alamat }}</p>

        {{-- email siswa --}}
        <p><b>Email:</b> {{ $datauser->email }}</p>

        {{-- no_handphone siswa --}}
        <p><b>No HP:</b> {{ $datauser->no_handphone }}</p>

        <a href="{{ route('siswa.index') }}" class="btn-back">← Kembali</a>
    </div>
@endsection
