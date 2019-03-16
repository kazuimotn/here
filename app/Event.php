<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    //
    protected $table = 'event';

    protected $fillable = [
        'longitude', 'latitude', 'when','user_id',
    ];
}
