<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Jadwal;
use App\Models\MataPelajaran;
use App\Models\Kelas;

class JadwalController extends Controller
{
  private $konfigurasi;
  private $jadwal;
  private $mata_pelajaran;
  private $kelas;

  public function __construct()
  {
    $this->konfigurasi  = new Setting;
    $this->konfigurasi  = $this->konfigurasi->first();
    
    $this->mata_pelajaran = new MataPelajaran;
    $this->mata_pelajaran = $this->mata_pelajaran->get();
    
    $this->kelas  = new Kelas;
    $this->kelas  = $this->kelas->get();
    
    $this->jadwal  = new Jadwal;
  }
  
  public function index()
  {
    $data['konfigurasi']  = $this->konfigurasi;
    $data['jadwal']       = $this->jadwal->get();
    return view('admin/jadwal', $data);
  }
  
  public function create()
  {
    $data['konfigurasi']    = $this->konfigurasi;
    $data['mata_pelajaran'] = $this->mata_pelajaran;
    $data['kelas']          = $this->kelas;
    return view('admin/tambah_jadwal', $data);
  }
  
  public function store(Request $request)
  {
    $this->jadwal->id_jadwal          = uniqid('jadwal');
    $this->jadwal->mata_pelajaran_id  = $request->mata_pelajaran_id;
    $this->jadwal->kelas_id           = $request->kelas_id;
    $this->jadwal->hari               = $request->hari;
    $this->jadwal->jam_mulai          = $request->jam_mulai;
    $this->jadwal->jam_selesai        = $request->jam_selesai;
    $this->jadwal->status             = 'belum';
    $this->jadwal->created_at         = date('Y-m-d h:i:s');
    $this->jadwal->save();

    return redirect('admin/jadwal')->with('sukses', 'Berhasil tambah jadwal');
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
