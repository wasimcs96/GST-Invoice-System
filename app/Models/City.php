<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function state()
    {
        return $this->belongsTo('App\Models\States');

    }

    public function cityaddress()
    {
        return $this->hasMany('App\Models\Address');
    }
}
