<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }
}
