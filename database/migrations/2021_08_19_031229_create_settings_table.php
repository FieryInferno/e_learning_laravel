<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
  
  public function up()
  {
    Schema::create('setting', function (Blueprint $table) {
      $table->id('id_sekolah');
      $table->string('logo');
      $table->string('nama_aplikasi');
      $table->string('nama_sekolah');
      $table->string('nama_kepsek');
      $table->string('copyright');
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
        Schema::dropIfExists('settings');
    }
}
