<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{


    public function tasks()
    {
        return $this->hasMany('App\Models\DB\Task');
    }

    public function countTasks()
    {
        return $this->hasMany('App\Models\DB\Task')->count();
    }
}
