<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\TaskListRepositoryInterface;
use League\Flysystem\Exception;

/**
 * @property TaskListRepositoryInterface taskLists
 */
class TaskListController extends Controller
{

    protected $request;

    function __construct(TaskListRepositoryInterface $taskLists, Request $r)
    {
        $this->request = $r;
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
        return $this->index();

    }

    public function updateTaskLists()
    {
        try {
            $taskListId = $this->request->input('id');
            $this->taskLists->update($taskListId);
            return $this->respondSuccess();
        }catch (Exception $e){
            return $this->respondError();
        }
    }
}
