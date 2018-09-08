<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $profil;
	protected $table	 = "user";
	protected $fillable	 = [
		'first_name',
		'last_name',
		'email',
		'phone',
		'password',
		'id_address',
		'id_profil',
		'id_gender',
		'rgpd_date',
		'newsletter',
		'ip_address',
		'user_agent',
	];
	protected $hidden	 = [
		'',
	];

	public function setProfil()
	{

	}
}