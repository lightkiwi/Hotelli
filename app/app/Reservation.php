<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = "reservation";

    protected $fillable = [
        'start',
        'end',
        'id_user',
        'id_room',
        'id_specials',
        'persons',
    ];

    protected $hidden = [
        '',
    ];
}
