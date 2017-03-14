<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\TaskList;

class TodoAppController extends Controller
{
    protected $headers = [
        'Access-Control-Allow-Origin' => '*',
        "Access-Control-Allow-Credentials" => "true",
        "Access-Control-Allow-Methods" => " GET, PUT, POST, DELETE, OPTIONS",
        "Access-Control-Allow-Headers" => "Origin, Content-Type, X-Auth-Token , Authorization",
    ];
    protected $request;

    function __construct(Request $r)
    {
        $this->request = $r;
    }

    public function index()
    {
        $records = TaskList::get();
        foreach ($records as $record) {
            $record->countTasks = $record->countTasks();
        }
        return response($records->toArray(), 200)->withHeaders($this->headers);
    }

    public function createTaskList()
    {
        $newTaskListName = $this->request->input('taskList');
        $taskList = new TaskList();
        $taskList->name = $newTaskListName;
        $taskList->save();
        return response('Ok', 200, $this->headers);

    }

    public function getTasks()
    {
        $tasks = Task::where('task_list_id', '=', $this->request->id)->get();
        return response($tasks, 200, $this->headers);
    }

    public function updateTask()
    {
        $task = Task::find($this->request->input('id'));
        $task->task_text = $this->request->input('task_text');
        $task->is_checked = $this->request->input('is_checked');
        $task->task_list_id = $this->request->input('task_list_id');
        $task->save();
        return response('Ok', 200, $this->headers);
    }

    public function createTask()
    {

        $task = new Task();
        $task->task_text = $this->request->input('task_text');
        $task->is_checked = $this->request->input('is_checked');
        $task->task_list_id = $this->request->input('task_list_id');
        $task->save();
        return response('Ok', 200, $this->headers);
    }

    public function removeTask()
    {
        if ($this->request->id) {
            $task = Task::find($this->request->id);
            $task->delete();
        }
        return response('Ok', 200, $this->headers);
    }

    public function updateTaskLists(){
        $taskList = TaskList::find($this->request->input('id'));
        $taskList->name = $this->request->input('name');
        $taskList->save();
        return response('Ok', 200, $this->headers);
    }
}
