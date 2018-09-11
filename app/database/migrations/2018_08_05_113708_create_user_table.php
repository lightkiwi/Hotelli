<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user',
		 function (Blueprint $table) {
			$table->increments('id');
			$table->string('first_name', 50);
			$table->string('last_name', 50);
			$table->string('email', 150)->unique();
			$table->timestamp('email_verified_at')->nullable();
			$table->string('phone', 20)->nullable();
			$table->string('password');
			$table->integer('id_address')->nullable();
			$table->integer('id_profil')->default(3);
			$table->integer('id_gender')->default(0);
			$table->timestamp('rgpd_date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->boolean('newsletter')->default(false);
			$table->ipAddress('ip_address')->default('0.0.0.0');
			$table->string('user_agent')->default('nc');
			$table->rememberToken();
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
		Schema::dropIfExists('user');
	}
}