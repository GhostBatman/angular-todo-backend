<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\TaskRepositoryInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    function __construct(TaskRepositoryInterface $tasks)
    {
        $this->tasks = $tasks;

    }

    public function index()
    {
        $tasks = $this->tasks->all();
        return $this->respondData($tasks);
    }

    public function updateTask()
    {
        $this->tasks->update();
        return $this->respondSuccess();
    }

    public function createTask()
    {

        $this->tasks->create();
        return $this->respondSuccess();
    }

    public function removeTask()
    {
        $this->tasks->delete();
        return $this->respondSuccess();
    }

}
