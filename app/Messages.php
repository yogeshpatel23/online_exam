<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    public function user()
    {   
        return $this->belongsTo('App\User');
    }

    public function sender()
    {   
        return $this->belongsTo('App\User', 'from_id');
    }
}
