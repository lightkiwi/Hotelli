<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room',
		 function (Blueprint $table) {
			$table->increments('id');
			$table->float('area')->nullable();
			$table->string('title', 50);
			$table->string('description', 250);
			$table->string('number', 10);
			$table->float('price');
			$table->float('score')->nullable();
			$table->integer('persons');
			$table->integer('id_hotel')->default(1);
			$table->integer('id_state');
			$table->integer('id_type');
			$table->integer('id_media');
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
		Schema::dropIfExists('room');
	}
}