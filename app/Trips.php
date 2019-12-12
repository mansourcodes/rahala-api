<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    //

    public function client()
    {
        return $this->belongsTo('App\Clients');
    }
}
