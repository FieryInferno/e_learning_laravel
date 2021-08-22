<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;

class AdminController extends Controller
{
  private $konfigurasi;

  public function __construct()
  {
    $this->konfigurasi  = new Setting;
    $this->konfigurasi  = $this->konfigurasi->first();

    $this->user = new User;
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

  public function ubahProfile(Request $request)
  {
    $request->validate([
      'nama_lengkap'  => ['required'],
      'username'      => ['required'],
    ]);

    $user = $this->user->find($request->id_user);

    $user->nama_lengkap = $request->nama_lengkap;
    $user->username     = $request->username;

    $user->save();

    return redirect('admin/profile');
  }
}
