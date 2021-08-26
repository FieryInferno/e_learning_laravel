<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
  private $setting;

  public function __construct()
  {
    $this->setting  = new Setting;
  }
  
  public function index()
  {
    $data = $this->setting->first();
    return view('admin/setting', $data);
  }

  public function update(Request $request)
  {
    $setting                = $this->setting->first();

    $file = $request->file('logo');
    if ($file) {
      $file->move('images', $file->getClientOriginalName());
      File::exists(public_path('images/' . $setting->logo)) ? File::delete(public_path('images/' . $setting->logo)) : '';
      $setting->logo          = $file->getClientOriginalName();
    }
    
    $setting->nama_aplikasi = $request->nama_aplikasi;
    $setting->nama_sekolah  = $request->nama_sekolah;
    $setting->nama_kepsek   = $request->nama_kepsek;
    $setting->copyright     = $request->copyright;
    $setting->updated_at    = date('Y-m-d H:i:s');
    $setting->save();

    return redirect('admin/setting')->with('sukses', 'BERHASIL MENGUPDATE SETTING APLIKASI');
  }
}
