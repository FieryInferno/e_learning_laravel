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
    // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('logo');

    // isi dengan nama folder tempat kemana file diupload
    $tujuan_upload = 'data_file';

    // upload file
    $file->move('images', $file->getClientOriginalName());

    $setting                = $this->setting->first();
    $setting->logo          = $file->getClientOriginalName();
    $setting->nama_aplikasi = $request->nama_aplikasi;
    $setting->nama_sekolah  = $request->nama_sekolah;
    $setting->nama_kepsek   = $request->nama_kepsek;
    $setting->copyright     = $request->copyright;
    $setting->updated_at    = date('Y-m-d H:i:s');
    $setting->save();

    return redirect('admin/setting')->with('sukses', 'Berhasil Mengupdate Setting Aplikasi');
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
