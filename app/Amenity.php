<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    public function tickets()
    {
        return $this->belongsToMany('App\Ticket');
    }
}
