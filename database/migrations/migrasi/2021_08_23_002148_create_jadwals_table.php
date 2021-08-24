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
      $table->foreignId('mata_pelajaran_id')->constrained('mata_pelajaran')->onUpdate('cascade')->onDelete('cascade');
      $table->foreignId('kelas_id')->constrained('kelas')->onUpdate('cascade')->onDelete('cascade');
      $table->string('hari');
      $table->time('jam_mulai');
      $table->time('jam_selesai');
      $table->enum('status', ['dipilih', 'belum']);
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
