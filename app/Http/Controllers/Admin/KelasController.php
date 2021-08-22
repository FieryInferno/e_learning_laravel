<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Kelas;

class KelasController extends Controller
{
  private $konfigurasi;
  private $kelas;

  public function __construct()
  {
    $this->konfigurasi  = new Setting;
    $this->konfigurasi  = $this->konfigurasi->first();
    
    $this->kelas  = new Kelas;
  }
  
  public function index()
  {
    $data['konfigurasi']  = $this->konfigurasi;
    $data['kelas']        = $this->kelas->get();
    return view('admin/kelas', $data);
  }
  
  public function store(Request $request)
  {
    $this->kelas->id_kelas    = uniqid('kelas');
    $this->kelas->nama_kelas  = $request->nama_kelas;
    $this->kelas->save();
    return redirect('admin/kelas')->with('sukses', 'Berhasil tambah kelas');
  }
  
  public function update(Request $request, $id)
  {
    $kelas  = $this->kelas->find($id);

    $kelas->nama_kelas  = $request->nama_kelas;
    $kelas->save();
    
    return redirect('admin/kelas')->with('sukses', 'Berhasil edit kelas');
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
