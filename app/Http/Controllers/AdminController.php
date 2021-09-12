<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

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

    if ($request->password_lama && $request->password_baru) {
      if (password_verify($request->password_lama, auth()->user()->password)) {
        $user->password = Hash::make($request->password_baru);
      }
    }

    $foto = $request->file('foto');
    if ($foto) {
      $foto->move('images', $foto->getClientOriginalName());
      File::exists(public_path('images/' . $user->foto)) ? File::delete(public_path('images/' . $user->foto)) : '';
      $user->foto = $foto->getClientOriginalName();
    }

    $user->updated_at = date('Y-m-d h:i:s');

    $user->save();

    return redirect('admin/profile')->with('sukses', 'BERHASIL EDIT PROFILE');
  }
}
