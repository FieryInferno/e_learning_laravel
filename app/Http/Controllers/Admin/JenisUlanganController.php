<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\JenisUlangan;

class JenisUlanganController extends Controller
{
  private $konfigurasi;
  private $jenis_ulangan;

  public function __construct()
  {
    $this->konfigurasi  = new Setting;
    $this->konfigurasi  = $this->konfigurasi->first();
    
    $this->jenis_ulangan  = new JenisUlangan;
  }
  
  public function index()
  {
    $data['konfigurasi']    = $this->konfigurasi;
    $data['jenis_ulangan']  = $this->jenis_ulangan->get();
    return view('admin/jenis_ulangan', $data);
  }
  
  public function store(Request $request)
  {
    $this->jenis_ulangan->id_jenis_ulangan    = uniqid('jenis_ulangan');
    $this->jenis_ulangan->nama_jenis_ulangan  = $request->nama_jenis_ulangan;
    $this->jenis_ulangan->created_at          = date('Y-m-d h:i:s');
    $this->jenis_ulangan->save();
    return redirect('admin/jenis_ulangan')->with('sukses', 'BERHASIL MENAMBAHKAN JENIS ULANGAN');
  }
  
  public function update(Request $request, $id)
  {
    $jenis_ulangan  = $this->jenis_ulangan->find($id);

    $jenis_ulangan->nama_jenis_ulangan  = $request->nama_jenis_ulangan;
    $jenis_ulangan->updated_at          = date('Y-m-d h:i:s');

    $jenis_ulangan->save();

    return redirect('admin/jenis_ulangan')->with('sukses', 'BERHASIL MENGEDIT JENIS ULANGAN');
  }

  public function destroy($id)
  {
    $jenis_ulangan  = $this->jenis_ulangan->find($id);
    
    $jenis_ulangan->delete();

    return redirect('admin/jenis_ulangan')->with('sukses', 'BERHASIL MENGHAPUS JENIS ULANGAN');
  }
}
