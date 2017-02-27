<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Requests;
use App\Tab;

class JsonApiController extends Controller
{
    function __construct(Request $r)
    {
        $this->requset = $r;
    }

    public function index()
    {
        $records = Tab::get();
        foreach ($records as $record) {
            $record->countTasks = $record->countTasks();
        }
        return $records->toArray();
    }

    public function getTasks()
    {
        return Task::where('tab_id', '=', $this->requset->id)->get();
    }

    public function updateTask()
    {
        $task = Task::find($this->requset->input('id'));
        $task->taskText = $this->requset->input('taskText');
        $task->is_checked = $this->requset->input('is_checked');
        $task->tab_id = $this->requset->input('tab_id');
        $task->save();
        return response('Ok', 200);
    }

    public function createTask()
    {
        $task = new Task();
        $task->taskText = $this->requset->input('taskText');
        $task->is_checked = $this->requset->input('is_checked');
        $task->tab_id = $this->requset->input('tab_id');
        $task->save();
        return response('Ok', 200);
    }

    public function removeTask()
    {
        if ($this->requset->id) {
            $task = Task::find($this->requset->id);
            $task->delete();
        }
        return response('Ok', 200);
    }
}
