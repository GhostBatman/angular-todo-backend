<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    protected $request;

    function __construct(Request $r)
    {
        $this->request = $r;
    }

    public function getTasks()
    {
        $tasks = Task::where('task_list_id', '=', $this->request->id)->get();
        return $this->respondData($tasks);
    }

    public function updateTask()
    {
        $task = Task::find($this->request->input('id'));
        $task->task_text = $this->request->input('task_text');
        $task->is_checked = $this->request->input('is_checked');
        $task->task_list_id = $this->request->input('task_list_id');
        $task->save();
        return $this->respondSuccess();
    }

    public function createTask()
    {

        $task = new Task();
        $task->task_text = $this->request->input('task_text');
        $task->is_checked = $this->request->input('is_checked');
        $task->task_list_id = $this->request->input('task_list_id');
        $task->save();
        return $this->respondSuccess();
    }

    public function removeTask()
    {
        if ($this->request->id) {
            $task = Task::find($this->request->id);
            $task->delete();
        }
        return $this->respondSuccess();
    }

}
