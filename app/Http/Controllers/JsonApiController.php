<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Requests;
use App\Tab;

class JsonApiController extends Controller
{
    protected $headers = [
        'Access-Control-Allow-Origin' => '*',
        "Access-Control-Allow-Credentials" => "true",
        "Access-Control-Allow-Methods" => " GET, PUT, POST, DELETE, OPTIONS",
        "Access-Control-Allow-Headers" => "Origin, Content-Type, X-Auth-Token , Authorization",
    ];

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
        return response($records->toArray(), 200)->withHeaders($this->headers);;
    }

    public function createTaskList()
    {
        $newTaskListName = $this->request->input('taskList');
        $taskList = new Tab();
        $taskList->name = $newTaskListName;
        $taskList->active = true;
        $taskList->save();
        return response('Ok', 200)->withHeaders($this->headers);

    }

    public function getTasks()
    {
        $tasks = Task::where('tab_id', '=', $this->request->id)->get();
        return response($tasks, 200)->withHeaders($this->headers);;
    }

    public function updateTask()
    {
        $task = Task::find($this->request->input('id'));
        $task->taskText = $this->request->input('taskText');
        $task->is_checked = $this->request->input('is_checked');
        $task->tab_id = $this->request->input('tab_id');
        $task->save();
        return response('Ok', 200)->withHeaders($this->headers);;
    }

    public function createTask()
    {
        $task = new Task();
        $task->taskText = $this->request->input('taskText');
        $task->is_checked = $this->request->input('is_checked');
        $task->tab_id = $this->request->input('tab_id');
        $task->save();
        return response('Ok', 200)->withHeaders($this->headers);;
    }

    public function removeTask()
    {
        if ($this->request->id) {
            $task = Task::find($this->request->id);
            $task->delete();
        }
        return response('Ok', 200)->withHeaders($this->headers);;
    }
}
