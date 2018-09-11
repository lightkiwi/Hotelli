<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	protected $profil	 = 'test';
	protected $table	 = "user";
	protected $fillable	 = [
		'first_name',
		'last_name',
		'email',
		'phone',
		'password',
		'id_address',
		'id_profil',
		'profil',
		'id_gender',
		'rgpd_date',
		'newsletter',
		'ip_address',
		'user_agent',
	];
	protected $hidden	 = [
		'password', 'remember_token',
	];

//	public function profil()
//	{
//		return $this->belongsTo('App\Profil');
//	}
//	public function setProfil()
//	{
////		$profil = \App\User::all();
//		$this->profil = User::leftJoin('profil', 'id_profil', '=', 'profil.id');
////		$room = \App\Room::leftJoin('media', 'room.id_media', '=', 'media.id')
////            ->find($id);
//	}
//	public function setProfil()
//	{
////		$profil = \App\User::all();
//		$this->profil = Profil::getAttribute($this->id_profil);
//	}
}