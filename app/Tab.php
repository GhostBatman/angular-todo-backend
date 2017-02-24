<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tab extends Model
{


    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
