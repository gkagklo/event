<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function amenities()
    {
        return $this->belongsToMany('App\Amenity');
    }
}
