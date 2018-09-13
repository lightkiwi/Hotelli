<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

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
		//initialisation de la table des profils
		DB::table('profil')->insert([
			'label' => 'administrateur'
		]);
		DB::table('profil')->insert([
			'label' => 'employé'
		]);
		DB::table('profil')->insert([
			'label' => 'client'
		]);

		//initialisation de la table des genres
		DB::table('gender')->insert([
			'label' => 'ne souhaite pas de prononcer'
		]);
		DB::table('gender')->insert([
			'label' => 'femme'
		]);
		DB::table('gender')->insert([
			'label' => 'homme'
		]);
		DB::table('gender')->insert([
			'label' => 'autre'
		]);

		//initialisation de l'état de la chambre
		DB::table('state')->insert([
			'label' => 'disponible'
		]);
		DB::table('state')->insert([
			'label' => 'indisponible'
		]);
		DB::table('state')->insert([
			'label' => 'en travaux'
		]);
		DB::table('state')->insert([
			'label' => 'à nettoyer'
		]);

		//initialisation de la table type
		DB::table('type')->insert([
			'label' => 'nc',
		]);

		//initalisation des réductions
		DB::table('specials')->insert([
			'code'	 => 'WELLCOME',
			'reduce' => '50',
		]);

		//initialisation client
		DB::table('hotel')->insert([
			'name'		 => 'Gand Budapest Hôtel',
			'phone'		 => '0424422442',
			'id_address' => '1',
		]);

		//initialisation de la table des réservations
		DB::table('address')->insert([
			'address_line'	 => '1 rue du GBH',
			'city'			 => 'Budapest',
			'region'		 => 'region',
			'zip'			 => '38350',
			'country'		 => 'Hongrie',
		]);

		//initialisation utilisateurs
		DB::table('user')->insert([
			'first_name' => 'admin',
			'last_name'	 => 'hotelli',
			'email'		 => 'admin@hotelli.fr',
			'phone'		 => '0424422442',
			'password'	 => Hash::make('hotelli'),
			'id_address' => '1',
			'id_profil'	 => 1,
			'id_gender'	 => 4,
		]);
		DB::table('user')->insert([
			'first_name' => 'employe',
			'last_name'	 => 'hotelli',
			'email'		 => 'employe@hotelli.fr',
			'phone'		 => '0424422442',
			'password'	 => Hash::make('hotelli'),
			'id_address' => '1',
			'id_profil'	 => 2,
			'id_gender'	 => 4,
		]);
		DB::table('user')->insert([
			'first_name' => 'user',
			'last_name'	 => 'hotelli',
			'email'		 => 'user@hotelli.fr',
			'phone'		 => '0424422442',
			'password'	 => Hash::make('hotelli'),
			'id_address' => '1',
			'id_profil'	 => 3,
			'id_gender'	 => 4,
		]);

		//jeu d'utilisateurs lambda
		$first_name = array(
			'John',
			'Marie',
			'Fabien',
			'Jennifer',
			'Sophiane',
			'Johnny',
			'Barnabé',
			'Octavie',
		);
		for ($i = 0; $i < 5; $i++) {
			DB::table('user')->insert([
				'first_name' => $first_name[$i],
				'last_name'	 => 'hotelli',
				'email'		 => 'user'.$i.'@gmail.fr',
				'phone'		 => '0424422442',
				'password'	 => Hash::make('hotelli'),
				'id_address' => '1',
				'id_profil'	 => 3,
				'id_gender'	 => 4,
			]);
		}

		//initialisation des médias
		DB::table('media')->insert([
			'path' => '/img/default-room.jpg',
		]);
		DB::table('media')->insert([
			'path' => 'https://www.breaffyhouseresort.com/cmsGallery/imagerow/6884/resized/450x350/room4_websize.jpg',
		]);
		DB::table('media')->insert([
			'path' => 'https://myremodelright.com/wp-content/uploads/2017/08/sunken-room-additions-450x350.jpg',
		]);
		DB::table('media')->insert([
			'path' => 'https://www.mandaley.fr/wp-content//hotels-les-plus-attendus-de-2018-bandeau-450x350.jpg',
		]);
		DB::table('media')->insert([
			'path' => 'https://www.breaffyhouseresort.com/cmsGallery/imagerow/6884/resized/450x350/room3_websize.jpg',
		]);
		DB::table('media')->insert([
			'path' => 'https://www.choicevacationrentals.com/sites/default/files/styles/450x350/public/image_cambria_beds.jpg?itok=wvj79-ja',
		]);

		//initialisation des chambres
		$title = array(
			'Takách',
			'Majoros',
			'Fábián',
			'Mester',
			'Kántor',
			'Bernát',
			'Keresztes',
			'Varga',
		);

		$description = array(
			'est une chambre familial et agréable pour un séjour de détente',
			'dispose de beaucoup de lumière et une très belle vue',
			'est la mieux exposée et la plus luxueuse de l\'hôtel avec une magnifique vue sur la montagne',
			'est une chambre qui convient parfaitement pour faire une pause en voyage d\'affaire',
			'est une chambre de luxe élégante avec une salle de bains',
		);

		for ($i = 0; $i < 5; $i++) {
			$rand = rand(50, 250);
			DB::table('room')->insert([
				'area'			 => $rand,
				'title'			 => 'Suite '.$title[$i],
				'description'	 => 'La suite '.$title[$i].' '.$description[$i],
				'number'		 => rand(1, 10).str_shuffle('ABC'),
				'price'			 => round(($rand * 0.80)),
				'score'			 => (rand(30, 50) / 10),
				'persons'		 => rand(1, 10),
				'id_hotel'		 => '1',
				'id_state'		 => '1',
				'id_type'		 => '1',
				'id_media'		 => ($i + 1),
			]);
		}

		//initialisation de la table des réservations
		DB::table('reservation')->insert([
			'start'		 => Carbon::today(),
			'end'		 => Carbon::today()->addDay(3),
			'persons'	 => rand(1, 4),
			'id_user'	 => '3',
			'id_room'	 => '1',
		]);

		for ($i = 0; $i < 5; $i++) {
			DB::table('reservation')->insert([
				'start'		 => Carbon::today()->addDay(rand(1, 5)),
				'end'		 => Carbon::today()->addDay(rand(5, 7)),
				'persons'	 => rand(1, 4),
				'id_user'	 => rand(4, 9),
				'id_room'	 => $i + 1,
			]);
		}

		//initialisation de la table des commentaires
		/* for ($i = 0; $i < 10; $i++) {
		  DB::table('comment')->insert([
		  'id_room' => rand(1, 5),
		  'id_user' => 1,
		  'text' => str_shuffle('azertyuiopqsdfghjklmwxcvbn'),
		  'id_parent' => null,
		  'score' => 5.4,
		  ]);
		  } */
	}
}