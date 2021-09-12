<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Semester;

class SemesterController extends Controller
{
  private $konfigurasi;

  public function __construct()
  {
    $this->konfigurasi  = new Setting;
    $this->konfigurasi  = $this->konfigurasi->first();
    
    $this->semester = new semester;
  }
  
  public function index()
  {
    $data['konfigurasi']  = $this->konfigurasi;
    $data['semester']     = $this->semester->get();
    return view('admin/semester', $data);
  }
}
