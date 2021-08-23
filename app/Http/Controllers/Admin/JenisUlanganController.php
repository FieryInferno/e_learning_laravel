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
    $this->jenis_ulangan->save();
    return redirect('admin/jenis_ulangan')->with('sukses', 'Berhasil menambahkan jenis ulangan');
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
