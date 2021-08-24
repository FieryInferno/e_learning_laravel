<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
  
  public function up()
  {
    Schema::create('guru', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
      $table->string('nip');
      $table->timestamps();
    });
  }
  
  public function down()
  {
    Schema::dropIfExists('guru');
  }
}
