<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
  use HasFactory;
  protected $table  = 'jadwal';

  public function mata_pelajaran()
  {
    return $this->hasOne(MataPelajaran::class, 'id', 'mata_pelajaran_id');
  }

  public function kelas()
  {
    return $this->hasOne(Kelas::class, 'id', 'kelas_id');
  }
}
