<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    //Relations

    public function booklate()
    {
        return $this->belongsTo('App\Booklate','qbid');
    }
}
