<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{


    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function countTasks()
    {
        return $this->hasMany('App\Task')->count();
    }
}
