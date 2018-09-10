<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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
		'password', 'remember_token',
	];

	public function setProfil()
	{

	}
}