<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = "gender";

    protected $fillable = [
        'gender_label',
    ];

    protected $hidden = [
        '',
    ];
}
