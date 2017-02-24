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
        return Tab::with('tasks')->get();
    }

    public function editAndCreateTask(Request $r)
    {
        if ($r->input('id')) {
            $task = Task::find($r->input('id'));
        } else {
            $task = new Task();
        }
        $task->taskText = $r->input('taskText');
        $task->is_checked = $r->input('is_checked');
        $task->tab_id = $r->input('tab_id');
        $task->save();
        return response('Ok', 200);
    }

    public function removeTask(Request $r)
    {
        if ($r->input('id')) {
            $task = Task::find($r->input('id'));
            $task->delete();
        }
        return response('Ok', 200);
    }
}
