<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;


Route::get('/', [SiswaController::class, 'index'])->name('siswa.index');

Route::get('/siswa/create', [SiswaController::class, 'create']);

Route::post('siswa/store', [SiswaController::class, 'store']);

Route::get('/siswa/delete/{id}', [SiswaController::class, 'destroy']);

Route::get('/siswa/show/{id}',[SiswaController::class, 'show']);

Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit']);

Route::post('/siswa/update/{id}', [SiswaController::class, 'update']);


//route clases

Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');

Route::get('/kelas/create', [KelasController::class, 'create']);

Route::post('/kelas/store', [KelasController::class, 'store']);

Route::get('/kelas/show/{id}', [KelasController::class, 'show']);

Route::get('/kelas/edit/{id}', [KelasController::class, 'edit']);

Route::post('/kelas/update/{id}', [KelasController::class, 'update']);

Route::get('/kelas/delete/{id}', [KelasController::class, 'destroy']);





