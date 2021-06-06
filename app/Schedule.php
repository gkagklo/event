<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function speaker()
    {
        return $this->belongsTo('App\Speaker');
    }

}
