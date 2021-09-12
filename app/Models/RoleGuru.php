<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleGuru extends Model
{
  use HasFactory;
  protected $table  = 'role_guru';

  public function jadwal()
  {
    return $this->belongsTo(Jadwal::class);
  }

  public function mataPelajaran()
  {
    return $this->belongsTo(MataPelajaran::class);
  }

  public function guru()
  {
    return $this->belongsTo(Guru::class, 'guru_id', 'id');
  }
}
