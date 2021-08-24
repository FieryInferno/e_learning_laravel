<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\MataPelajaranController;
use App\Http\Controllers\Admin\JenisUlanganController;
use App\Http\Controllers\Admin\JadwalController;

Route::get('/', [LoginController::class, 'login'])->name('login');
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
        Route::post('/edit/{id}', [JadwalController::class, 'update']);
        Route::get('/hapus/{id}', [JadwalController::class, 'destroy']);
      });
    });
  });

  Route::get('/logout', [LoginController::class, 'logout']);
});