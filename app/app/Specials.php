<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specials extends Model
{
    protected $table = "specials";

    protected $fillable = [
        'code',
        'reduce',
    ];

    protected $hidden = [
        '',
    ];
}
