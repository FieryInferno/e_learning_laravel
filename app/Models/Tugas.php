<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
  use HasFactory;
  protected $table  = 'tugas';

  public function jenis_tugas()
  {
    return $this->hasOne(JenisTugas::class, 'id', 'jenis_tugas_id');
  }

  public function mata_pelajaran()
  {
    return $this->hasOne(MataPelajaran::class, 'id', 'mata_pelajaran_id');
  }

  public function semester()
  {
    return $this->hasOne(Semester::class, 'id', 'semester_id');
  }
}
