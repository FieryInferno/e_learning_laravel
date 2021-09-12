<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\JenisUlanganController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;



Route::get('/', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::middleware('auth')->group(function () {
  Route::middleware('is_admin')->group(function () {
    Route::prefix('admin')->group(function () {
      Route::get('/', [AdminController::class, 'index']);
      Route::prefix('setting')->group(function () {
        Route::get('/', [SettingController::class, 'index']);
        Route::post('/ubah', [SettingController::class, 'update']);
      });

      Route::prefix('profile')->group(function () {
        Route::get('/', [AdminController::class, 'profile']);
        Route::post('/ubah', [AdminController::class, 'ubahProfile']);
      });

      Route::prefix('kelas')->group(function () {
        Route::get('/', [KelasController::class, 'index']);
        Route::post('/tambah', [KelasController::class, 'store']);
        Route::post('/edit/{id}', [KelasController::class, 'update']);
        Route::get('/hapus/{id}', [KelasController::class, 'destroy']);
      });

      Route::prefix('semester')->group(function () {
        Route::get('/', [SemesterController::class, 'index']);
      });

      Route::prefix('mata_pelajaran')->group(function () {
        Route::get('/', [MataPelajaranController::class, 'index']);
        Route::post('/tambah', [MataPelajaranController::class, 'store']);
        Route::post('/edit/{id}', [MataPelajaranController::class, 'update']);
        Route::get('/hapus/{id}', [MataPelajaranController::class, 'destroy']);
      });

      Route::prefix('jenis_ulangan')->group(function () {
        Route::get('/', [JenisUlanganController::class, 'index']);
        Route::post('/tambah', [JenisUlanganController::class, 'store']);
        Route::post('/edit/{id}', [JenisUlanganController::class, 'update']);
        Route::get('/hapus/{id}', [JenisUlanganController::class, 'destroy']);
      });

      Route::prefix('jadwal')->group(function () {
        Route::get('/', [JadwalController::class, 'index']);
        Route::get('/tambah', [JadwalController::class, 'create']);
        Route::post('/tambah', [JadwalController::class, 'store']);
        Route::get('/edit/{id}', [JadwalController::class, 'edit']);
        Route::post('/edit/{id}', [JadwalController::class, 'update']);
        Route::get('/hapus/{id}', [JadwalController::class, 'destroy']);
      });

      Route::prefix('guru')->group(function () {
        Route::get('/', [GuruController::class, 'index']);
        Route::get('/tambah', [GuruController::class, 'create']);
        Route::post('/tambah', [GuruController::class, 'store']);
        Route::get('/edit/{id}', [GuruController::class, 'edit']);
        Route::post('/edit/{id}', [GuruController::class, 'update']);
        Route::delete('/hapus/{id}', [GuruController::class, 'destroy']);
        Route::get('/reset_password/{id}', [GuruController::class, 'resetPassword']);
      });

      Route::prefix('siswa')->group(function () {
        Route::get('/', [SiswaController::class, 'index']);
        Route::get('/tambah', [SiswaController::class, 'create']);
        Route::post('/tambah', [SiswaController::class, 'store']);
        Route::get('/edit/{id}', [SiswaController::class, 'edit']);
        Route::post('/edit/{id}', [SiswaController::class, 'update']);
        Route::delete('/hapus/{id}', [SiswaController::class, 'destroy']);
        Route::get('/reset_password/{id}', [SiswaController::class, 'resetPassword']);
      });
    });
  });

  Route::middleware('is_guru')->group(function () {
    Route::prefix('guru')->group(function () {
      Route::get('/', [App\Http\Controllers\GuruController::class, 'guru']);
    });
  });

  Route::get('/logout', [LoginController::class, 'logout']);
});