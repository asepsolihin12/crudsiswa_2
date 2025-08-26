{{--memanggil atau menhubungkan dengan file app--}}
@extends('Layouts.app')
@section('title', 'Halaman Kelas')
@section('content')
    <style>
    body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        background: #eef2f7;
        color: #333;
    }

    header {
        background: linear-gradient(135deg, #3a7bd5, #3a6073);
        color: white;
        padding: 20px;
        text-align: center;
        font-size: 22px;
        font-weight: bold;
        letter-spacing: 1px;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    main {
        padding: 30px;
    }

    h2 {
        margin-bottom: 20px;
        color: #2c3e50;
        border-left: 5px solid #3a7bd5;
        padding-left: 10px;
    }

    /* Tabel */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 6px 12px rgba(0,0,0,0.1);
    }

    table thead {
        background: #3a7bd5;
        color: white;
    }

    table th, table td {
        padding: 14px 16px;
        text-align: left;
    }

    table tbody tr:nth-child(even) {
        background: #f9fafe;
    }

    table tbody tr:hover {
        background: #e8f0fe;
        transition: 0.3s;
    }

    /* Tombol */
    .btn {
        padding: 8px 14px;
        text-decoration: none;
        border-radius: 6px;
        font-size: 14px;
        margin: 2px;
        display: inline-block;
        font-weight: 500;
        transition: all 0.2s ease-in-out;
    }

    .btn-success { background: #1cc88a; color: white; }
    .btn-info { background: #36b9cc; color: white; }
    .btn-warning { background: #f6c23e; color: white; }
    .btn-danger { background: #e74a3b; color: white; }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }

    /* Tombol utama */
    .btn-primary {
        background: #3a7bd5;
        color: white;
        padding: 10px 16px;
        border-radius: 6px;
        font-size: 15px;
        margin-bottom: 15px;
        display: inline-block;
    }
    .btn-primary:hover {
        background: #2c5fa8;
    }

    /* Link kembali */
    .back-link {
        display: inline-block;
        margin-top: 20px;
        color: #3a7bd5;
        text-decoration: none;
        font-weight: bold;
    }
    .back-link:hover {
        text-decoration: underline;
    }
    </style>

    <header>📚 Manajemen Kelas</header>
    <main>
        <h2>Daftar Kelas</h2>
        <a href="/kelas/create/" class="btn-primary">+ Tambah Kelas</a>
        
        <table>
            <thead>
                <tr>
                    <th>Nama Kelas</th>
                    <th>Deskripsi</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelases as $kelas )
                    <tr>
                        <td>{{$kelas->nama_kelas}}</td>
                        <td>{{$kelas->deskripsi}}</td>
                        <td>
                            <a href="/kelas/edit/{{$kelas->id}}" class="btn btn-warning">✏ Edit</a>
                            <a href="/kelas/show/{{$kelas->id}}" class="btn btn-info">🔍 Detail</a>
                            <a href="/kelas/delete/{{$kelas->id}}" class="btn btn-danger">🗑 Delete</a>
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>

        <a href="/" class="back-link">⬅ Kembali ke menu siswa</a>
    </main>
@endsection
