<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\TaskListRepositoryInterface;

class TaskListController extends Controller
{

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
        $this->taskLists->create();
        return $this->respondSuccess();

    }

    public function updateTaskLists()
    {
        $this->taskLists->update();
        return $this->respondSuccess();
    }
}
