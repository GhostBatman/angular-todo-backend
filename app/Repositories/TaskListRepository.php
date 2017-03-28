<?php
namespace App\Repositories;

use Illuminate\Http\Request;
use App\Repositories\Contracts\TaskListRepositoryInterface;
use App\Models\DB\TaskList;

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
        foreach ($records as $record) {
            $record->countTasks = $record->countTasks();
        }
        return ($records);
    }

    public function create()
    {
        $newTaskListName = $this->request->input('taskList');
        $taskList = new TaskList();
        $taskList->name = $newTaskListName;
        $taskList->save();
    }

    public function update()
    {
        $taskList = TaskList::find($this->request->input('id'));
        $taskList->name = $this->request->input('name');
        $taskList->save();
    }


}