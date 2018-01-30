<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {
  
  public function up()
  {
    Schema::create('users', function(Blueprint $table) {
      $table->increments('id');
      $table->string('first_name', 255)->nullable();
      $table->string('last_name', 255)->nullable();
      $table->string('email', 255)->unique();
      $table->string('password', 255);
      $table->string('timezone', 255)->nullable();
      $table->string('sbu', 255)->nullable();
      $table->string('language', 255)->nullable();
      $table->string('encryption', 255)->nullable();
      $table->string('license', 255)->nullable();
      $table->string('cdn', 255)->nullable();
      $table->string('remember_token', 255)->nullable();
      $table->integer('type')->default(2);
      $table->integer('active')->default(0);
      $table->softDeletes();
      $table->timestamps();
    });
  }
  
  public function down()
  {
    DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    Schema::dropIfExists('users');
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
  }
}