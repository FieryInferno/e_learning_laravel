<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class AdminController extends Controller
{
  private $konfigurasi;

  public function __construct()
  {
    $this->konfigurasi  = new Setting;
    $this->konfigurasi  = $this->konfigurasi->first();
  }
  
  public function index()
  {
    $data['konfigurasi']  = $this->konfigurasi;
    return view('admin/dashboard', $data);
  }

  public function profile()
  {
    $data['konfigurasi']  = $this->konfigurasi;
    return view('admin/profile', $data);
  }
}
