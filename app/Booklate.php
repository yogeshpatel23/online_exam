<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booklate extends Model
{
    //primary Key
    protected $primaryKey = 'qbid';

    //dataase relation
    public function questions()
    {
        return $this->hasMany('App\Question','qbid');
    }

    public function exams()
    {
        return $this->hasMany('App\Exam','qbid');
    }
}
