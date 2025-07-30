<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; // pastikan model User di-import

class Clas extends Model
{
    // Nama tabel
    protected $table = "clases";

    // Semua kolom dapat diisi (tidak ada proteksi mass-assignment)
    protected $guarded = [];

    // Relasi ke model User
    public function user() // disarankan pakai jamak untuk relasi hasMany
    {
        return $this->hasMany(User::class, 'clas_id');
    }
}
