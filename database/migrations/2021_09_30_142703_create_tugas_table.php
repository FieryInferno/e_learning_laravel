<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasTable extends Migration
{
  public function up()
  {
    Schema::create('jenis_tugas', function (Blueprint $table) {
      $table->id();
      $table->string('jenis_tugas');
      $table->timestamps();
    });
    
    Schema::create('tugas', function (Blueprint $table) {
      $table->id();
      $table->foreignId('jenis_tugas_id')->constrained('jenis_tugas')->onUpdate('cascade')->onDelete('cascade');
      $table->string('judul_tugas');
      $table->string('isi_tugas');
      $table->date('tanggal');
      $table->integer('waktu');
      $table->integer('jumlah_anggota');
      $table->foreignId('guru_id')->constrained('guru')->onUpdate('cascade')->onDelete('cascade');
      $table->foreignId('mata_pelajaran_id')->constrained('mata_pelajaran')->onUpdate('cascade')->onDelete('cascade');
      $table->foreignId('semester_id')->constrained('semester')->onUpdate('cascade')->onDelete('cascade');
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
      Schema::dropIfExists('tugas');
  }
}
