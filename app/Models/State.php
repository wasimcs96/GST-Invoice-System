<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function cities()
    {
        return $this->hasMany('App\City');
    }

    public function stateaddress()
    {
        return $this->hasMany('App\Address');
    }

}