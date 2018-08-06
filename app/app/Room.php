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
        'price',
        'score',
        'id_hotel',
        'id_type',
    ];

    protected $hidden = [
        '',
    ];
}
