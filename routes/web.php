<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\MataPelajaranController;

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
      });
    });
  });

  Route::get('/logout', [LoginController::class, 'logout']);
});