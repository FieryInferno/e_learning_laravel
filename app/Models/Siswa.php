<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
  use HasFactory;
  protected $table  = 'siswa';
  
  public function user()
  {
    return $this->hasOne(User::class, 'id', 'user_id');
  }

  public function kelas()
  {
    return $this->hasOne(User::class, 'id', 'kelas_id');
  }
}
