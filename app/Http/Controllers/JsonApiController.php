<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

use Requests;
use App\Tab;
use Illuminate\Support\Facades\Input;

class JsonApiController extends Controller
{

    public function index()
    {
        $records = Tab::get();
        foreach ($records as $record) {
            $record->countTasks = $record->countTasks();
        }
        return $records->toArray();
    }

    public function getTasks(Request $r)
    {
return Task::where('tab_id', '=', $r->id)->get();
    }

    public function updateTask(Request $r)
    {
        $task = Task::find($r->input('id'));
        $task->taskText = $r->input('taskText');
        $task->is_checked = $r->input('is_checked');
        $task->tab_id = $r->input('tab_id');
        $task->save();
        return response('Ok', 200);
    }

    public function createTask(Request $r)
    {
        $task = new Task();
        $task->taskText = $r->input('taskText');
        $task->is_checked = $r->input('is_checked');
        $task->tab_id = $r->input('tab_id');
        $task->save();
        return response('Ok', 200);
    }

    public function removeTask(Request $r)
    {
        if ($r->id) {
            $task = Task::find($r->id);
            $task->delete();
        }
        return response('Ok', 200);
    }
}
