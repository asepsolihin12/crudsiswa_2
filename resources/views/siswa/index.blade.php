{{-- memanggil atau menhubungkan dengan file app --}}
@extends('Layouts.app')
@section('title', 'Halaman siswa')
@section('css')

<div class="container">
    <div class="header">
        <h1><b>Halaman Utama Siswa</b></h1>
        <h3>Daftar Siswa</h3>
    </div>

    <div class="btn-container">
        <a href="/siswa/create" class="btn-add">
            <i>＋</i> Tambah Siswa
        </a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>KELAS</th>
                    <th>NISN</th>
                    <th>ALAMAT</th>
                    <th>PHOTO</th>
                    <th>OPTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswas as $siswa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $siswa->name }}</td>
                    <td>{{ $siswa->kelas->nama ?? '-' }}</td>
                    <td>{{ $siswa->nisn }}</td>
                    <td>{{ $siswa->alamat }}</td>
                    <td class="photo-cell">
                        <img src="{{ asset('storage/' . $siswa->photo) }}" class="student-photo" alt="Photo Siswa">
                    </td>
                    <td class="action-cell">
                        <a onclick="return confirm('Apa yakin?')" 
                           href="/siswa/delete/{{ $siswa->id }}" 
                           class="btn-action btn-delete">Hapus</a>
                        <a href="/siswa/edit/{{ $siswa->id }}" 
                           class="btn-action btn-edit">Edit</a>
                        <a href="/siswa/show/{{ $siswa->id }}" 
                           class="btn-action btn-detail">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    * {
        margin: 0; padding: 0; box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    body {
        background: linear-gradient(135deg, #eef2f3, #e0eafc);
        color: #334155; line-height: 1.6; padding: 20px;
    }
    .container {
        max-width: 1200px; margin: 0 auto;
    }
    .header {
        text-align: center; margin-bottom: 30px; padding: 30px;
        background: linear-gradient(135deg, #6366f1, #4f46e5);
        border-radius: 20px; color: white;
        box-shadow: 0 10px 30px rgba(99,102,241,0.3);
    }
    .header h1 { font-size: 2.5rem; margin-bottom: 10px; font-weight: 700; }
    .header h3 { font-size: 1.3rem; opacity: 0.9; }

    .btn-container { text-align: right; margin-bottom: 20px; }
    .btn-add {
        background: #10b981; padding: 12px 24px; color: white;
        border-radius: 12px; text-decoration: none; font-weight: 600;
        transition: 0.3s; box-shadow: 0 4px 15px rgba(16,185,129,0.4);
    }
    .btn-add:hover { background: #059669; transform: translateY(-3px); }

    .table-container {
        background: white; border-radius: 16px; overflow: hidden;
        box-shadow: 0 6px 25px rgba(0,0,0,0.08); overflow-x: auto;
    }
    table {
        width: 100%; border-collapse: collapse; min-width: 800px;
    }
    th, td {
        padding: 16px 20px; text-align: left;
        border-bottom: 1px solid #e2e8f0;
    }
    th {
        background-color: #f1f5f9; font-weight: 600;
        text-transform: uppercase; font-size: 0.9rem;
    }
    tr:hover { background-color: #f9fafb; transition: 0.2s; }
    tr:nth-child(even) { background-color: #fafafa; }
    tr:nth-child(even):hover { background-color: #f1f5f9; }

    .student-photo {
        width: 70px; height: 70px; border-radius: 12px;
        object-fit: cover; border: 2px solid #e2e8f0;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        transition: 0.3s;
    }
    .student-photo:hover { transform: scale(1.05); border-color: #6366f1; }

    .btn-action {
        display: inline-block; padding: 8px 14px; margin: 3px;
        border-radius: 8px; font-size: 0.85rem; font-weight: 500;
        text-decoration: none; transition: 0.3s;
    }
    .btn-delete {
        background: #fee2e2; color: #dc2626; border: 1px solid #fecaca;
    }
    .btn-delete:hover { background: #dc2626; color: white; }
    .btn-edit {
        background: #dbeafe; color: #2563eb; border: 1px solid #bfdbfe;
    }
    .btn-edit:hover { background: #2563eb; color: white; }
    .btn-detail {
        background: #dcfce7; color: #16a34a; border: 1px solid #bbf7d0;
    }
    .btn-detail:hover { background: #16a34a; color: white; }
</style>
@endsection
