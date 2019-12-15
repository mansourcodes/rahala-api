<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function trips()
    {
        return $this->hasMany('App\Trip');
    }
}
