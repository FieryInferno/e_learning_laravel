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
  
  public function edit($id)
  {
    $data                   = $this->jadwal->find($id);
    $data['konfigurasi']    = $this->konfigurasi;
    $data['mata_pelajaran'] = $this->mata_pelajaran;
    $data['kelas']          = $this->kelas;
    return view('admin/edit_jadwal', $data);
  }
  
  public function update(Request $request, $id)
  {
    $jadwal = $this->jadwal->find($id);

    $jadwal->mata_pelajaran_id  = $request->mata_pelajaran_id;
    $jadwal->kelas_id           = $request->kelas_id;
    $jadwal->hari               = $request->hari;
    $jadwal->jam_mulai          = $request->jam_mulai;
    $jadwal->jam_selesai        = $request->jam_selesai;
    $jadwal->updated_at         = date('Y-m-d h:i:s');
    $jadwal->save();

    return redirect('admin/jadwal')->with('sukses', 'Berhasil edit jadwal');
  }
  
  public function destroy($id)
  {
    $jadwal = $this->jadwal->find($id);

    $jadwal->delete();

    return redirect('admin/jadwal')->with('sukses', 'Berhasil hapus jadwal');
  }
}
