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
    <a href="/siswa">Kembali ke Daftar Siswa</a>
        
    <form>
        <div>
             <label>Nama</label>
             <input type="text" name="nama" placeholder="Masukan Nama Siswa"><br>
        </div>
        <br>
        <div>
             <label>Kelas</label>
             <select name="kelas_id">
                <option value="XII">XII PPLG-1</option><br>
                <option value="XII">XII PPLG-2</option><br>
                <option value="XII">XII PPLG-3</option><br>
             </select>
        </div>
        <br>
        <div>
             <label>Nisn</label>
             <input type="text" name="nisn" placeholder="Masukan Nisn"><br>
        </div>
        <br>
        <div>
             <label>Alamat</label>
             <input type="text" name="alamat" placeholder="Masukan Alamat"><br>
        </div>
        <br>
        <div>
             <label>Email</label>
             <input type="text" name="email" placeholder="Masukan Email"><br>
        </div>
        <br>
        <div>
             <label>Password</label>
             <input type="password" name="Password" placeholder="Masukan Password"><br>
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