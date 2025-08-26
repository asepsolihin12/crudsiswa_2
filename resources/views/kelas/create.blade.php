{{--memanggil atau menhubungkan dengan file app--}}
@extends('layouts.app')
@section('title', 'Tambah kelas')
@section('css')
<style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 40px;
            background-color:rgb(190, 230, 216);
        }

        /* Tambahan background dekoratif */
        

        .form-wrapper {
            position: relative;
            /* z-index: -1; */
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            animation: fadeIn 0.8s ease-in-out;
        }

        .form-wrapper h1 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 26px;
            color: #2c3e50;
        }

        .form-wrapper b {
            display: block;
            text-align: center;
            margin-bottom: 20px;
            font-size: 14px;
            color: #7f8c8d;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            color: #34495e;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #dcdcdc;
            border-radius: 10px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            background: #fefefe;
        }

        input[type="text"]:focus {
            border-color: #88bdbc; /* sage green */
            box-shadow: 0 0 8px rgba(136, 189, 188, 0.4);
            outline: none;
        }

        small {
            font-size: 13px;
            color: #e74c3c;
        }

        a {
            display: inline-block;
            margin-bottom: 15px;
            text-decoration: none;
            color: #88bdbc; /* soft sage green */
            font-weight: 600;
            transition: 0.3s;
        }

        a:hover {
            color: #5e8d8c;
        }

        button {
            display: block;
            width: 100%;
            background: linear-gradient(135deg, #88bdbc, #6fa8a7);
            color: #fff;
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(136,189,188,0.35);
        }

        button:hover {
            background: linear-gradient(135deg, #6fa8a7, #5c8f8e);
            transform: translateY(-2px);
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
@endsection
@section('content')
    
    <div class="form-wrapper">
        <h1>Tambah Kelas</h1>
        <h1><b>Halaman Untuk Menambah Data Siswa</b></h1>
        <b>Form Tambah Kelas</b>
        
        <a href="/kelas">← Kembali ke beranda</a>

        <form action="/kelas/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label>Nama Kelas:</label>
                <input type="text" name="nama_kelas" placeholder="Masukkan Nama Kelas">
                @error('nama_kelas')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label for="jurusan">Deskripsi:</label>
                <input type="text" name="description" id="deskripsi" placeholder="Masukkan Deskripsi/Jurusan">
                @error('description')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <button type="submit">Simpan</button>
        </form>
    </div>
@endsection
