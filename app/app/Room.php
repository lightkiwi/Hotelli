<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = "room";

    protected $fillable = [
        'area',
        'title',
        'description',
        'number',
        'price',
        'score',
        'persons',
        'id_hotel',
        'id_state',
        'id_type',
        'id_media',
    ];

    protected $hidden = [
        '',
    ];
}
