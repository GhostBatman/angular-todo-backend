<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\TaskRepositoryInterface;
use Illuminate\Http\Request;

/**
 * @property TaskRepositoryInterface tasks
 * @property Request request
 */
class TaskController extends Controller
{

    function __construct(TaskRepositoryInterface $tasks, Request $r)
    {
        $this->tasks = $tasks;
        $this->request = $r;

    }

    public function index()
    {
        $tasks = $this->tasks->all($this->request->id);
        return $this->respondData($tasks);
    }

    public function updateTask()
    {
        $task['id'] = $this->request->input('id');
        $task['task_text'] = $this->request->input('task_text');
        $task['is_checked'] = $this->request->input('is_checked');
        $task['task_list_id'] = $this->request->input('task_list_id');
        $this->tasks->update($task);
        return $this->respondSuccess();
    }

    public function createTask()
    {
        $task['task_text'] = $this->request->input('task_text');
        $task['is_checked'] = $this->request->input('is_checked');
        $task['task_list_id'] = $this->request->input('task_list_id');
        $this->tasks->create($task);
        return $this->respondSuccess();
    }

    public function removeTask()
    { $taskId = $this->request->id;
        $this->tasks->delete($taskId );
        return $this->respondSuccess();
    }

}
