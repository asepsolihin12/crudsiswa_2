<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Tambah Siswa</title>
</head>
<body>
    <h1><b>Halaman Tambah Siswa</b></h1>
    <b>Form Tambah Siswa</b>
    <a href="/">Kembali ke Daftar Siswa</a>
    <form action ="/siswa/store" method="POST">
            @csrf
        
    <form>
        <div>
             <label>Nama</label>
             <br>
             <input type="text" name="name" placeholder="Masukan Nama Siswa"><br>
             @error('name')
             <small style="color: red;">{{ $message}}</small>
               @enderror
        </div>
        <br>
        <div>
             <label>Kelas</label>
             <select name="kelas_id">
                <option value="1">XII PPLG-1</option><br>
                <option value="2">XII PPLG-2</option><br>
                <option value="3">XII PPLG-3</option><br>
                @error ('kelas_id')
                <small style="color:red";>{{ $message}}</small>
               @enderror
             </select>
        </div>
        <br>
        <div>
             <label>Nisn</label>
             <br>
             <input type="text" name="nisn" placeholder="Masukan Nisn"><br>
             @error('nisn')
             <small style="color: red,">{{ $message}}</small>
               @enderror
        </div>
        <br>
        <div>
             <label>Alamat</label>
             <br>
             <input type="text" name="alamat" placeholder="Masukan Alamat"><br>
             @error('alamat')
               <small style="color: red">{{ $message}}</small>
               @enderror
        </div>
        <br>
        <div>
             <label>Email</label>
             <br>
             <input type="text" name="email" placeholder="Masukan Email"><br>
             @error('email')
               <small style="color: red">{{ $message}}</small>
               @enderror
        </div>
        <br>
        <div>
             <label>Password</label>
             <br>
             <input type="password" name="password" placeholder="Masukan Password"><br>
             @error('password')
               <small style="color: red">{{ $message}}</small>
               @enderror
        </div>
        <br>
        <div>
             <label>No Handphone</label>
             <br>
             <input type="tel" name="no_handphone" placeholder="Masukan No Handphone"><br>
             @error('no_handphone')
               <small style="color: red">{{ $message}}</small>
               @enderror
        </div>
        <br>
        <div>
             <label>PHOTO</label>
             <input type="file" name="foto" placeholder="Masukan Photo"><br>
        </div><br>

        <button type="submit">Simpan</button>
        <button type="reset">Reset</button>        
</body>
</html>