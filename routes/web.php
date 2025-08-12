<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

Route::get('/', [SiswaController::class, 'index'])->name('siswa.index');

Route::get('/siswa/create', [SiswaController::class, 'create']);

Route::post('siswa/store', [SiswaController::class, 'store']);

Route::get('/siswa/delete/{id}', [SiswaController::class, 'destroy']);

Route::get('/siswa/show/{id}',[SiswaController::class, 'show']);

Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit']);

Route::post('/siswa/update/{id}', [SiswaController::class, 'update']);