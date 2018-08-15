<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		// $this->call(UsersTableSeeder::class);

		DB::table('profil')->insert([
			'label' => 'administrateur'
		]);
		DB::table('profil')->insert([
			'label' => 'employé'
		]);
		DB::table('profil')->insert([
			'label' => 'client'
		]);

		DB::table('gender')->insert([
			'label' => 'ne souhaite pas de prononcer'
		]);
		DB::table('gender')->insert([
			'label' => 'féminin'
		]);
		DB::table('gender')->insert([
			'label' => 'masculin'
		]);
		DB::table('gender')->insert([
			'label' => 'autre'
		]);

		DB::table('state')->insert([
			'label' => 'prête'
		]);
		DB::table('state')->insert([
			'label' => 'en travaux'
		]);
		DB::table('state')->insert([
			'label' => 'à nettoyer'
		]);

		//initialisation client
		DB::table('hotel')->insert([]);

		//initialisation utilisateurs
		DB::table('user')->insert([
			'first_name' => 'root',
			'last_name'	 => 'hotelli',
			'email'		 => 'contact@hotelli.fr',
			'phone'		 => '0424422442',
			'password'	 => md5('hotelli'),
			'id_profil'	 => 1,
			'id_gender'	 => 4,
		]);
	}
}