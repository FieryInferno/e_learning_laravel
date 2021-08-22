<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MembuatTableAdmin extends Migration
{
  
  public function up()
  {
    Schema::create('admin', function (Blueprint $table) {
      $table->id();
      $table->string('id_admin');
      $table->string('id_user');
    });
  }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
