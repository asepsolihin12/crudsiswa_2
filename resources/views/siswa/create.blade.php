@extends('Layouts.app')
@section('title', 'Tambah siswa')
@section('content')

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #c9d6ff, #e2e2e2);
            margin: 0;
            padding: 40px;
            color: #2c3e50;
        }

        h1 {
            text-align: center;
            font-size: 30px;
            margin-bottom: 15px;
            color: #34495e;
            font-weight: 700;
        }

        a {
            display: inline-block;
            margin-bottom: 25px;
            text-decoration: none;
            color: #3498db;
            font-weight: 600;
            transition: 0.3s;
        }

        a:hover {
            color: #1d6fa5;
        }

        form {
            max-width: 650px;
            margin: auto;
            background: #fff;
            padding: 35px 40px;
            border-radius: 18px;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        form:hover {
            transform: translateY(-5px);
        }

        label {
            font-weight: 600;
            margin-bottom: 8px;
            display: inline-block;
            color: #2c3e50;
        }

        .input-group {
            margin-bottom: 18px;
        }

        input, select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #dcdcdc;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
            transition: 0.3s;
        }

        input:focus, select:focus {
            border-color: #3498db;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.3);
        }

        small {
            font-size: 12px;
        }

        .btn-group {
            margin-top: 20px;
            text-align: right;
        }

        button {
            padding: 12px 24px;
            margin-left: 10px;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        button[type="submit"] {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: #fff;
        }

        button[type="submit"]:hover {
            background: linear-gradient(135deg, #2980b9, #1f5f85);
            transform: scale(1.05);
        }

        button[type="reset"] {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: #fff;
        }

        button[type="reset"]:hover {
            background: linear-gradient(135deg, #c0392b, #962d22);
            transform: scale(1.05);
        }
    </style>

    <h1>✨ Tambah Data Siswa ✨</h1>
    <a href="/">← Kembali ke Daftar Siswa</a>

    <form action="/siswa/store" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="input-group">
            <label>Nama</label>
            <input type="text" name="name" placeholder="Masukkan Nama Siswa" value="{{ old('name') }}">
            @error('name') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div class="input-group">
            <label for="kelas_id">Kelas</label>
            <select name="kelas_id" id="kelas_id">
                @foreach ($clases as $clas)
                    <option value="{{ $clas->id }}">{{ $clas->nama_kelas }}</option>
                @endforeach
            </select>
            @error('kelas_id') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div class="input-group">
            <label>NISN</label>
            <input type="text" name="nisn" placeholder="Masukkan NISN" value="{{ old('nisn') }}">
            @error('nisn') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div class="input-group">
            <label>Alamat</label>
            <input type="text" name="alamat" placeholder="Masukkan Alamat" value="{{ old('alamat') }}">
            @error('alamat') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div class="input-group">
            <label>Email</label>
            <input type="text" name="email" placeholder="Masukkan Email" value="{{ old('email') }}">
            @error('email') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan Password">
            @error('password') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div class="input-group">
            <label>No Handphone</label>
            <input type="tel" name="no_handphone" placeholder="Masukkan No Handphone" value="{{ old('no_handphone') }}">
            @error('no_handphone') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div class="input-group">
            <label>Photo</label>
            <input type="file" name="photo">
            @error('photo') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div class="btn-group">
            <button type="reset">Reset</button>
            <button type="submit">Simpan</button>
        </div>
    </form>
@endsection
