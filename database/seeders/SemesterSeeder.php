<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
  
  public function run()
  {
    DB::table('semester')->insert([
      [
        'id_semester'   => '1',
        'nama_semester' => 'GANJIL'
      ], [
        'id_semester'   => '2',
        'nama_semester' => 'GENAP'
      ]
    ]);
  }
}
