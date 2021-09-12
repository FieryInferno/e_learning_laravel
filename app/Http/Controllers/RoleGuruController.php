<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\RoleGuru;
use App\Models\MataPelajaran;
use App\Models\Kelas;
use App\Models\Jadwal;

class RoleGuruController extends Controller
{
  private $konfigurasi;

  public function __construct()
  {
    $this->konfigurasi  = new Setting;
    $this->konfigurasi  = $this->konfigurasi->first();
    
    $this->role_guru      = new RoleGuru;
    $this->mata_pelajaran = new MataPelajaran;
    $this->kelas          = new Kelas;
    $this->jadwal         = new Jadwal;
  }
  
  public function index()
  {
    $data['konfigurasi']  = $this->konfigurasi;
    $data['role_guru']    = $this->role_guru->where('guru_id', auth()->user()->guru->id)->get();
    return view('guru/mapel/index', $data);
  }
  
  public function create()
  {
    $data['konfigurasi']    = $this->konfigurasi;
    $data['mata_pelajaran'] = $this->mata_pelajaran->get();
    $data['kelas']          = $this->kelas->get();
    return view('guru/mapel/tambah', $data);
  }

  public function getJadwal(Request $request)
  {
    $jadwal = $this->jadwal
                ->where('mata_pelajaran_id', $request->mata_pelajaran_id)
                ->where('kelas_id', $request->kelas_id)
                ->get();
    return response()->json($jadwal);
  }
  
  public function store(Request $request)
  {
    $this->role_guru->guru_id         = auth()->user()->guru->id;
    $this->role_guru->jadwal_id       = $request->jadwal;
    $this->role_guru->created_at      = date('Y-m-d h:i:s');
    $this->role_guru->jadwal->status  = 'dipilih';
    
    $this->role_guru->save();
    $this->role_guru->jadwal->save();
   
    return redirect('guru/mata_pelajaran')->with('sukses', 'BERHASIL TAMBAH JADWAL');    
  }
  
  public function edit($id)
  {
    $data['role']         = $this->role_guru->find($id);
    $data['mapel']        = $this->mata_pelajaran->get();
    $data['kelas']        = $this->kelas->get();
    $data['konfigurasi']  = $this->konfigurasi;
    $data['jadwal']       = $this->jadwal
                              ->where('mata_pelajaran_id', $data['role']->jadwal->mata_pelajaran_id)
                              ->where('kelas_id', $data['role']->jadwal->kelas_id)
                              ->get();
    return view('guru/mapel/edit', $data);
  }
  
  public function update(Request $request, $id)
  {
    $role = $this->role_guru->find($id);
    
    if ($role->jadwal_id !== $request->jadwal) {
      $role->jadwal->status = 'belum';
      $role->jadwal->save();

      $role->jadwal_id  = $request->jadwal;
    }
    $role->updated_at      = date('Y-m-d h:i:s');
    $role->jadwal->status  = 'dipilih';
    
    $role->save();
    $role->jadwal->save();

    return redirect('/guru/mata_pelajaran')->with('sukses', 'BERHASIL EDIT JADWAL');
  }
  
  public function destroy($id)
  {
    $role_guru = $this->role_guru->find($id);
    
    $role_guru->jadwal->status = 'belum';

    $role_guru->jadwal->save();
    $role_guru->delete();
    
    return redirect()->back()->with('sukses', 'BERHASIL HAPUS JADWAL');
  }
}
