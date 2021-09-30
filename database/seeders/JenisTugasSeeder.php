<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisTugasSeeder extends Seeder
{
  
  public function run()
  {
    DB::table('jenis_tugas')->insert([
      ['jenis_tugas'  => 'individu'],
      ['jenis_tugas'  => 'kelompok'],
    ]);
  }
}
