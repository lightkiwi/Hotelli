<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
	protected $table	 = "profil";
	protected $fillable	 = [
		'profil_label',
	];
	protected $hidden	 = [
		'',
	];

	public function user()
	{
		return $this->hasMany('App\user');
	}
}