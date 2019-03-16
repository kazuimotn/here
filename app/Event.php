<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    //
    protected $table = 'event';

    protected $fillable = [
        'longitude', 'latitude', 'start_time','user_id',
    ];
}
