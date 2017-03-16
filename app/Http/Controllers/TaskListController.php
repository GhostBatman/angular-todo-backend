<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskList;

class TaskListController extends Controller
{

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
        return $this->respondData($records->toArray());
    }

    public function createTaskList()
    {
        $newTaskListName = $this->request->input('taskList');
        $taskList = new TaskList();
        $taskList->name = $newTaskListName;
        $taskList->save();
        return $this->respondSuccess();

    }

    public function updateTaskLists()
    {
        $taskList = TaskList::find($this->request->input('id'));
        $taskList->name = $this->request->input('name');
        $taskList->save();
        return $this->respondSuccess();
    }
}
