<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function state()
    {
        return $this->belongsTo('App\States');

    }

    public function cityaddress()
    {
        return $this->hasMany('App\Address');
    }
}