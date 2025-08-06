<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Utama</title>
</head>
<body>
    <h1><b>Halaman Utama Siswa</b></h1>
    <h3>Daftar Siswa</h3>
    <a href="/siswa/create">Tambah Siswa</a>

    

    <table border="1" cellpading="10" cellspacing="0">
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
    </tbody>
         @foreach ($siswas as $siswa)
    <tr>
        <td>{{ $siswa->id }}</td>
        <td>{{ $siswa->name }}</td>
        <td>{{ $siswa->Clas->name }}</td>
        <td>{{ $siswa->nisn }}</td>
        <td>{{ $siswa->alamat }}</td>
        <td>
            <img src="{{ asset('storage/' . $siswa->photo) }}" alt="Photo Siswa" width="80">
        </td>
        <td>
            <a href="">EDIT</a>
            <a href="">HAPUS</a>
            <a href="">DETAIL</a>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
</body>
</html>