<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
  private $konfigurasi;
  private $guru;
  private $user;

  public function __construct()
  {
    $this->guru = new Guru;
    $this->user = new User;

    $this->konfigurasi  = new Setting;
    $this->konfigurasi  = $this->konfigurasi->first();
  }
  
  public function index()
  {
    $data['konfigurasi']  = $this->konfigurasi;
    $data['guru']         = $this->guru->get();
    return view('admin/guru/index', $data);
  }
  
  public function create()
  {
    $data['konfigurasi']  = $this->konfigurasi;
    return view('admin/guru/tambah', $data);
  } 

  public function store(Request $request)
  {
    $id_user  = uniqid('user');

    $file = $request->file('foto');
    $file->move('images', $file->getClientOriginalName());

    $this->user->id_user      = $id_user;
    $this->user->nama_lengkap = $request->nama_lengkap;
    $this->user->username     = $request->username;
    $this->user->password     = Hash::make($request->nip);
    $this->user->foto         = $file->getClientOriginalName();
    $this->user->created_at   = date('Y-m-d h:i:s');
    $this->user->save();

    $this->guru->user_id    = $this->user->id;
    $this->guru->nip        = $request->nip;
    $this->guru->created_at = date('Y-m-d h:i:s');
    $this->guru->save();

    return redirect('/admin/guru')->with('sukses', 'BERHASIL MENAMBAH GURU');
  }
  
  public function edit($id)
  {
    $data['guru']                 = $this->guru->find($id);
    $data['konfigurasi']  = $this->konfigurasi;
    return view('admin/guru/edit', $data); 
  }
  
  public function update(Request $request, $id)
  {
    
    $guru = $this->guru->find($id);

    $guru->nip        = $request->nip;
    $guru->updated_at = date('Y-m-d h:i:s');
    $guru->save();

    $user = $this->user->find($guru->user_id);

    $user->nama_lengkap = $request->nama_lengkap;
    $user->username     = $request->username;

    
    if ($request->file('foto')) {
      $file = $request->file('foto');
      $file->move('images', $file->getClientOriginalName());
      $user->foto = $file->getClientOriginalName();
    }
    
    $user->updated_at = date('Y-m-d h:i:s');
    $user->save();
    
    return redirect('/admin/guru')->with('sukses', 'BERHASIL MENGEDIT GURU');
  }
  
  public function destroy($id)
  {
      //
  }
}
