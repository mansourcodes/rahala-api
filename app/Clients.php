<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    //

    public function trips()
    {
        return $this->hasMany('App\Trips');
    }
}
