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

    return redirect('/admin/guru')->with('sukses', 'Berhasil menambah guru');
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
