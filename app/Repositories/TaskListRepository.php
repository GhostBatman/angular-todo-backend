<?php
namespace App\Repositories;

use Illuminate\Http\Request;
use App\Repositories\Contracts\TaskListRepositoryInterface;
use App\Models\DB\TaskList;
use App\Models\TaskListModel;

class TaskListRepository implements TaskListRepositoryInterface
{
    protected $request;

    function __construct(Request $r)
    {
        $this->request = $r;
    }

    public function all()
    {
        $records = TaskList::get();
        $model = [];
        foreach ($records as $record) {
            $record->countTasks = $record->countTasks();
            $task = new TaskListModel($record->toArray());
            array_push($model, $task);
        }
        return $model;

    }

    public function create(string $newTaskListName)
    {

        $taskList = new TaskList();
        $taskList->name = $newTaskListName;
        $taskList->save();
    }

    public function update(int $taskListId)
    {
        $taskList = TaskList::find($taskListId);
        $taskList->name = $this->request->input('name');
        $taskList->save();
    }


}