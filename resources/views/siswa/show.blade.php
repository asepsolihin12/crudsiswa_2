@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Detail Siswa</h2>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            @if($student->photo)
                                <img src="{{ asset('storage/' . $student->photo) }}" 
                                     alt="{{ $student->name }}" 
                                     class="img-thumbnail" 
                                     width="200" height="200">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&color=7F9CF5&background=EBF4FF" 
                                     alt="{{ $student->name }}" 
                                     class="img-thumbnail" 
                                     width="200" height="200">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h3>{{ $student->name }}</h3>
                            <p class="text-muted">{{ $student->nis }}</p>
                            <hr>
                            <p><strong>Kelas:</strong> {{ $student->class }}</p>
                            <p><strong>Jenis Kelamin:</strong> {{ $student->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                            <p><strong>TTL:</strong> {{ $student->birth_place }}, {{ $student->birth_date->format('d F Y') }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Kontak</h5>
                            <p><strong>Alamat:</strong> {{ $student->address }}</p>
                            <p><strong>Telepon:</strong> {{ $student->phone }}</p>
                            <p><strong>Email:</strong> {{ $student->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection