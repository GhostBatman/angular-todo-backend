<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

   // public function lastTask(){
   //     return $this->hasOne(ScheduledTaskLogTable::class, 'scheduled_task_id')->orderBy('id', 'desc');
   // }
}
