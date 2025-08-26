@extends('layouts.app')
@section('title', 'Edit Siswa')

@section('content')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 40px;
            color: #333;
        }

        h1 {
            text-align: center;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 30px;
            color: #1e3a8a; /* biru navy */
            letter-spacing: 1px;
        }

        .form-container {
            max-width: 750px;
            margin: auto;
            background: #fff;
            padding: 35px;
            border-radius: 14px;
            border: 1px solid #ddd;
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .form-container:hover {
            transform: translateY(-3px);
        }

        .profile-pic {
            display: block;
            margin: auto;
            border-radius: 12px;
            width: 130px;
            height: 130px;
            object-fit: cover;
            border: 3px solid #1e3a8a;
        }

        .form-container label {
            font-weight: 600;
            display: block;
            margin-top: 18px;
            color: #444;
            font-size: 14px;
        }

        .form-container input,
        .form-container select {
            width: 100%;
            padding: 12px 15px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background: #f9fafb;
            font-size: 15px;
            transition: 0.3s;
        }

        .form-container input:focus,
        .form-container select:focus {
            background: #fff;
            border: 1px solid #1e3a8a;
            outline: none;
            box-shadow: 0px 0px 6px rgba(30, 58, 138, 0.3);
        }

        .btn-group {
            margin-top: 30px;
            text-align: center;
        }

        .btn-group button {
            padding: 12px 28px;
            margin: 8px;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .btn-save {
            background: #1e3a8a;
            color: white;
        }

        .btn-save:hover {
            background: #162c65;
            transform: scale(1.05);
        }

        .btn-reset {
            background: #e11d48;
            color: white;
        }

        .btn-reset:hover {
            background: #b91c3a;
            transform: scale(1.05);
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #1e3a8a;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>

    <h1>✏️ Edit Data Siswa</h1>

    <div class="form-container">
        <a href="/" class="back-link">← Kembali</a>

        <img src="{{ asset('storage/' . $datauser->photo) }}" alt="Foto Siswa" class="profile-pic">

        <form action="/siswa/update/{{ $datauser->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Nama</label>
            <input type="text" name="name" value="{{ $datauser->name }}">

            <label>Kelas</label>
            <select name="kelas_id">
                @foreach ($clases as $clas)
                    <option {{ $clas->id == $datauser->clas_id ? 'selected' : '' }} value="{{ $clas->id }}">
                        {{ $clas->name }}
                    </option>
                @endforeach
            </select>

            <label>NISN</label>
            <input type="text" name="nisn" value="{{ $datauser->nisn }}">

            <label>Alamat</label>
            <input type="text" name="alamat" value="{{ $datauser->alamat }}">

            <label>Email</label>
            <input type="text" name="email" value="{{ $datauser->email }}">

            <label>Password</label>
            <input type="password" name="password">

            <label>No Handphone</label>
            <input type="tel" name="no_handphone" value="{{ $datauser->no_handphone }}">

            <label>Photo</label>
            <input type="file" name="photo">

            <div class="btn-group">
                <button type="submit" class="btn-save">💾 Simpan</button>
                <button type="reset" class="btn-reset">🔄 Reset</button>
            </div>
        </form>
    </div>
@endsection
