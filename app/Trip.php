<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
