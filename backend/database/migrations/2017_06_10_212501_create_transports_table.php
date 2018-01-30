<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('forklift_id');
            $table->string('fahrzeughalter');
            $table->string('destination');
            $table->string('lkw_nr');
            $table->string('fahrer');
            $table->string('container');
            $table->string('plomben_nr');
            $table->string('ankunft');
            $table->string('abfahrt');
            $table->string('adr');
            $table->string('luftfracht');
            $table->string('rampe')->comment('Zuweisung Dropdown Rampe 1 to Rampe 10');
            $table->string('status')->default(0)->comment('0=new, 1=pick by forklift');
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
        Schema::dropIfExists('transports');
    }
}
