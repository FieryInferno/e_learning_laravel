<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  
  public function login()
  {
    return view('login');
  }

  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
      'username'  => ['required'],
      'password'  => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      switch (auth()->user()->role) {
        case 'admin':
          return redirect()->intended('admin')->with('sukses', 'Berhasil login sebagai admin');
          break;
        case 'guru':
          return redirect()->intended('guru')->with('sukses', 'Berhasil login sebagai guru');
          break;
        case 'siswa':
          return redirect()->intended('siswa')->with('sukses', 'Berhasil login sebagai siswa');
          break;
      }
    }
  }

  public function logout(Request $request)
  {
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/')->with('sukses', 'Berhasil logout');
  }
}
