<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkedSocialAccount extends Model
{
    //
    protected $table = 'linked_social_account';

    protected $fillable = ['provider_name', 'provider_id' ];


    public function user()
{
    return $this->belongsTo('App\User');
}
}
