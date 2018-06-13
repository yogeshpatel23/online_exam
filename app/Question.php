<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //primary Key
    protected $primaryKey = 'qusid';

    //database relation
    public function booklate()
    {
        return $this->belongsTo('App\Booklate','qbid','qbid');
    }
}
