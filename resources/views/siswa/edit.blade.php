<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman edit</title>
</head>
<body>
    <h1><b>Halaman Edit Siswa</b></h1>
    <b>Form Edit Siswa</b>
    <br>
    <a href="/">Kembali</a>
    <br>
    <img src="{{ asset('storage/' . $datauser->photo) }}" alt="Foto Siswa" style="width: 150px; height: 150px;">
    <form action="/siswa/update/{{ $datauser->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
        <div>
            <label>Nama</label>
            <br>
            <input type="text" name="name" value="{{$datauser->name}}">
            <br>
            @error('name')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>

        <div>
            <label>Kelas</label><br>
            <select name="kelas_id">
                @foreach ($clases as $clas)
                    <option {{ $clas->id == $datauser->clas_id ? 'selected' : '' }} value="{{ $clas->id }}">{{ $clas->name }}</option>
                @endforeach
            </select>
            @error('kelas_id')
                <br><small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>

        <div>
            <label>NISN</label><br>
            <input type="text" name="nisn" value="{{ $datauser->nisn }}"><br>
            @error('nisn')
                <br><small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>

        <div>
            <label>Alamat</label><br>
            <input type="text" name="alamat" value="{{ $datauser->alamat }}"><br>
            @error('alamat')
                <br><small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>

        <div>
            <label>Email</label><br>
            <input type="text" name="email" value="{{ $datauser->email }}"><br>
            @error('email')
                <br><small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>

        <div>
            <label>Password</label><br>
            <input type="password" name="password"><br>
            @error('password')
                <br><small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>

        <div>
            <label>No Handphone</label><br>
            <input type="tel" name="no_handphone" value="{{ $datauser->no_handphone }}"><br>
            @error('no_handphone')
                <br><small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>

        <div>
            <label>Photo</label><br>
            <input type="file" name="photo">
            @error('photo')
                <br><small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>

        <button type="submit">Simpan</button>
        <button type="reset">Reset</button>
    </form>
</body>
</html>
