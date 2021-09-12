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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
