<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Tugas;

class TugasController extends Controller
{
  private $konfigurasi;
  private $tugas;

  public function __construct()
  {
    $this->konfigurasi  = new Setting;
    $this->konfigurasi  = $this->konfigurasi->first();

    $this->tugas = new Tugas;
  }
  
  public function index()
  {
    $data['konfigurasi']  = $this->konfigurasi;
    
    $tugas  = collect($this->tugas->where('guru_id', auth()->user()->guru->id)->get());
    
    $data['individu'] = $tugas->map(function ($item) {
      if ($item->jenis_tugas->jenis_tugas == 'individu') {
        return $item;
      }
    });

    $data['kelompok'] = $tugas->map(function ($item) {
      if ($item->jenis_tugas->jenis_tugas == 'kelompok') {
        return $item;
      }
    });
    return view('guru/tugas/index', $data);
  }

    public function create()
    {
        //
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
