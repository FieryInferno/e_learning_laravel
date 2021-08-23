<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
  
  public function up()
  {
    Schema::create('jadwal', function (Blueprint $table) {
      $table->id();
      $table->string('id_jadwal');
      $table->string('mata_pelajaran_id');
      $table->timestamps();
    });
  }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal');
    }
}
