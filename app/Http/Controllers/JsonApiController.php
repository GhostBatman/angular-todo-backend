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
        $this->request = $r;
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
        return Task::where('tab_id', '=', $this->request->id)->get();
    }

    public function updateTask()
    {
        $task = Task::find($this->request->input('id'));
        $task->taskText = $this->request->input('taskText');
        $task->is_checked = $this->request->input('is_checked');
        $task->tab_id = $this->request->input('tab_id');
        $task->save();
        return response('Ok', 200);
    }

    public function createTask()
    {
        $task = new Task();
        $task->taskText = $this->request->input('taskText');
        $task->is_checked = $this->request->input('is_checked');
        $task->tab_id = $this->request->input('tab_id');
        $task->save();
        return response('Ok', 200);
    }

    public function removeTask()
    {
        if ($this->request->id) {
            $task = Task::find($this->request->id);
            $task->delete();
        }
        return response('Ok', 200);
    }
}
