<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_role', 'role_id', 'user_id');
    }
}
