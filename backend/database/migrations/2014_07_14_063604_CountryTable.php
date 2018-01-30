<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CountryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create("country",function(Blueprint $table){
            //$table->engine = 'InnoDB';
            $table->increments("id");
            $table->string("latitude",25);
            $table->string("longitude",25);
            $table->string("country_code",5);
            $table->string("country_name");
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
        Schema::dropIfExists("country");
	}

}
