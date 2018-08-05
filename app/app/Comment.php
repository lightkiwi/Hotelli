<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";

    protected $fillable = [
        'id_room',
        'id_user',
        'text',
        'id_parent',
        'score',
    ];

    protected $hidden = [
        '',
    ];
}
