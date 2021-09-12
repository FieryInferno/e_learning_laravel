<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\MataPelajaran;

class MataPelajaranController extends Controller
{
  private $konfigurasi;
  private $mata_pelajaran;

  public function __construct()
  {
    $this->konfigurasi  = new Setting;
    $this->konfigurasi  = $this->konfigurasi->first();

    $this->mata_pelajaran  = new MataPelajaran;
  }

  public function index()
  {
    $data['konfigurasi']    = $this->konfigurasi;
    $data['mata_pelajaran'] = $this->mata_pelajaran->get();
    return view('admin/mata_pelajaran', $data);
  }
  
  public function store(Request $request)
  {
    $this->mata_pelajaran->id_mata_pelajaran    = uniqid('mapel');
    $this->mata_pelajaran->nama_mata_pelajaran  = $request->nama_mata_pelajaran;
    $this->mata_pelajaran->created_at           = date('Y-m-d h:i:s');
    $this->mata_pelajaran->save();
    return redirect('admin/mata_pelajaran')->with('sukses', 'BERHASIL TAMBAH MATA PELAJARAN');
  }
  
  public function update(Request $request, $id)
  {
    $mata_pelajaran = $this->mata_pelajaran->find($id);

    $mata_pelajaran->nama_mata_pelajaran  = $request->nama_mata_pelajaran;
    $mata_pelajaran->updated_at           = date('Y-m-d h:i:s');
    $mata_pelajaran->save();

    return redirect('admin/mata_pelajaran')->with('sukses', 'BERHASIL EDIT MATA PELAJARAN');
  }
  
  public function destroy($id)
  {
    $mata_pelajaran = $this->mata_pelajaran->find($id);

    $mata_pelajaran->delete();

    return redirect('admin/mata_pelajaran')->with('sukses', 'BERHASIL HAPUS MATA PELAJARAN');
  }
}
