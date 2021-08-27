<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Siswa;
use App\Models\Kelas;

class SiswaController extends Controller
{
  private $konfigurasi;
  private $siswa;
  private $kelas;

  public function __construct()
  {
    $this->konfigurasi  = new Setting;
    $this->konfigurasi  = $this->konfigurasi->first();

    $this->siswa  = new Siswa;

    $this->kelas  = new Kelas;
  }
  
  public function index()
  {
    $data['konfigurasi']  = $this->konfigurasi;
    $data['siswa']        = $this->siswa->get();
    return view('admin/siswa/index', $data);
  }
  
  public function create()
  {
    $data['konfigurasi']  = $this->konfigurasi;
    $data['kelas']        = $this->kelas->get();
    return view('admin/siswa/tambah', $data);
  }
  
  public function store(Request $request)
  {
    $this->siswa->user->nama_lengkap = $request->nama_lengkap;
    $this->siswa->user->username = $request->username;
    $this->siswa->user->kelas = $request->kelas;

    $file = $request->file('foto');
    $file->move('images', $foto->getClientOriginalName());
    $this->siswa->user->foto  = $foto->getClientOriginalName();

    $this->siswa->user()->save();

    $this->siswa->user_id = $this->siswa->user->id_user;
    $this->siswa->kelas_id = $this->siswa->kelas_id;
    $this->siswa->nis     = $request->nis;
    $this->siswa->save();

    return redirect('/admin/siswa')->with('sukses', 'BERHASIL MENAMBAH DATA SISWA');
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
