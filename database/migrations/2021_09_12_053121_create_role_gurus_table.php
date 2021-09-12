<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleGurusTable extends Migration
{
  
  public function up()
  {
    Schema::create('role_guru', function (Blueprint $table) {
      $table->id();
      $table->foreignId('guru_id')->constrained('guru')->onUpdate('cascade')->onDelete('cascade');
      $table->foreignId('jadwal_id')->constrained('jadwal')->onUpdate('cascade')->onDelete('cascade');
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
      Schema::dropIfExists('role_guru');
  }
}
