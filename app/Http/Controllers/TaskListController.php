<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\TaskListRepositoryInterface;

/**
 * @property TaskListRepositoryInterface taskLists
 */
class TaskListController extends Controller
{

    protected $request;

    function __construct(TaskListRepositoryInterface $taskLists)
    {
        $this->taskLists = $taskLists;
    }

    public function index()
    {
        $req = $this->taskLists->all();
        return $this->respondData($req);
    }

    public function createTaskList()
    {
        $newTaskListName = $this->request->input('taskList');
        $this->taskLists->create($newTaskListName);
        return $this->respondSuccess();

    }

    public function updateTaskLists()
    {
        $taskListId = $this->request->input('id');
        $this->taskLists->update($taskListId);
        return $this->respondSuccess();
    }
}
