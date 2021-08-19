<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::middleware('auth')->group(function () {
  Route::middleware('is_admin')->group(function () {
    Route::prefix('admin')->group(function () {
      Route::get('/', [AdminController::class, 'index']);
    });
  });
});