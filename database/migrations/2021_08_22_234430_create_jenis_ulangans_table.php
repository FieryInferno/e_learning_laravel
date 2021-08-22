<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisUlangansTable extends Migration
{
  
  public function up()
  {
    Schema::create('jenis_ulangan', function (Blueprint $table) {
      $table->id();
      $table->string('id_jenis_ulangan');
      $table->string('nama_jenis_ulangan');
      $table->timestamps();
    });
  }
  
  public function down()
  {
    Schema::dropIfExists('jenis_ulangan');
  }
}
