<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
  
  public function run()
  {
    DB::table('setting')->insert([
      'id_sekolah'    => 1,
      'logo'          => 'smpdw.png',
      'nama_aplikasi' => 'E - Learning',
      'nama_sekolah'  => 'SMP DHARMA WIWEKA',
      'nama_kepsek'   => 'Drs. I Nyoman Mariana M.Si',
      'copyright'     => 'SMP DHARMA WIWEKA'
    ]);
  }
}
