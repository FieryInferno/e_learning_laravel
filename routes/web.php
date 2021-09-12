<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate']);

Route::middleware('auth')->group(function () {
  Route::middleware('is_admin')->group(function () {
    Route::prefix('admin')->group(function () {
      Route::get('/', [App\Http\Controllers\AdminController::class, 'index']);
      Route::prefix('setting')->group(function () {
        Route::get('/', [App\Http\Controllers\SettingController::class, 'index']);
        Route::post('/ubah', [App\Http\Controllers\SettingController::class, 'update']);
      });

      Route::prefix('profile')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminController::class, 'profile']);
        Route::post('/ubah', [App\Http\Controllers\AdminController::class, 'ubahProfile']);
      });

      Route::prefix('kelas')->group(function () {
        Route::get('/', [App\Http\Controllers\KelasController::class, 'index']);
        Route::post('/tambah', [App\Http\Controllers\KelasController::class, 'store']);
        Route::post('/edit/{id}', [App\Http\Controllers\KelasController::class, 'update']);
        Route::get('/hapus/{id}', [App\Http\Controllers\KelasController::class, 'destroy']);
      });

      Route::prefix('semester')->group(function () {
        Route::get('/', [App\Http\Controllers\SemesterController::class, 'index']);
      });

      Route::prefix('mata_pelajaran')->group(function () {
        Route::get('/', [App\Http\Controllers\MataPelajaranController::class, 'index']);
        Route::post('/tambah', [App\Http\Controllers\MataPelajaranController::class, 'store']);
        Route::post('/edit/{id}', [App\Http\Controllers\MataPelajaranController::class, 'update']);
        Route::get('/hapus/{id}', [App\Http\Controllers\MataPelajaranController::class, 'destroy']);
      });

      Route::prefix('jenis_ulangan')->group(function () {
        Route::get('/', [App\Http\Controllers\JenisUlanganController::class, 'index']);
        Route::post('/tambah', [App\Http\Controllers\JenisUlanganController::class, 'store']);
        Route::post('/edit/{id}', [App\Http\Controllers\JenisUlanganController::class, 'update']);
        Route::get('/hapus/{id}', [App\Http\Controllers\JenisUlanganController::class, 'destroy']);
      });

      Route::prefix('jadwal')->group(function () {
        Route::get('/', [App\Http\Controllers\JadwalController::class, 'index']);
        Route::get('/tambah', [App\Http\Controllers\JadwalController::class, 'create']);
        Route::post('/tambah', [App\Http\Controllers\JadwalController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\JadwalController::class, 'edit']);
        Route::post('/edit/{id}', [App\Http\Controllers\JadwalController::class, 'update']);
        Route::get('/hapus/{id}', [App\Http\Controllers\JadwalController::class, 'destroy']);
      });

      Route::prefix('guru')->group(function () {
        Route::get('/', [App\Http\Controllers\GuruController::class, 'index']);
        Route::get('/tambah', [App\Http\Controllers\GuruController::class, 'create']);
        Route::post('/tambah', [App\Http\Controllers\GuruController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\GuruController::class, 'edit']);
        Route::post('/edit/{id}', [App\Http\Controllers\GuruController::class, 'update']);
        Route::delete('/hapus/{id}', [App\Http\Controllers\GuruController::class, 'destroy']);
        Route::get('/reset_password/{id}', [App\Http\Controllers\GuruController::class, 'resetPassword']);
      });

      Route::prefix('siswa')->group(function () {
        Route::get('/', [App\Http\Controllers\SiswaController::class, 'index']);
        Route::get('/tambah', [App\Http\Controllers\SiswaController::class, 'create']);
        Route::post('/tambah', [App\Http\Controllers\SiswaController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\SiswaController::class, 'edit']);
        Route::post('/edit/{id}', [App\Http\Controllers\SiswaController::class, 'update']);
        Route::delete('/hapus/{id}', [App\Http\Controllers\SiswaController::class, 'destroy']);
        Route::get('/reset_password/{id}', [App\Http\Controllers\SiswaController::class, 'resetPassword']);
      });
    });
  });

  Route::middleware('is_guru')->group(function () {
    Route::prefix('guru')->group(function () {
      Route::get('/', [App\Http\Controllers\GuruController::class, 'guru']);

      Route::prefix('mata_pelajaran')->group(function () {
        Route::get('/', [App\Http\Controllers\RoleGuruController::class, 'index']);
        Route::get('/tambah', [App\Http\Controllers\RoleGuruController::class, 'create']);
        Route::post('/tambah', [App\Http\Controllers\RoleGuruController::class, 'store']);
        Route::post('/get_jadwal', [App\Http\Controllers\RoleGuruController::class, 'getJadwal']);
      });
    });
  });

  Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout']);
});