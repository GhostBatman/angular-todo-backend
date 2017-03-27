<?php
namespace App\Repositories;

use App\Repositories\Contracts\TaskRepositoryInterface;
use App\Task;
use Illuminate\Http\Request;

class TaskRepository implements TaskRepositoryInterface
{
    protected $request;

    function __construct(Request $r)
    {
        $this->request = $r;
    }

    public function all()
    {
        return Task::where('task_list_id', '=', $this->request->id)->get();
    }

    public function update()
    {
        $task = Task::find($this->request->input('id'));
        $task->task_text = $this->request->input('task_text');
        $task->is_checked = $this->request->input('is_checked');
        $task->task_list_id = $this->request->input('task_list_id');
        $task->save();
    }

    public function create()
    {
        $task = new Task();
        $task->task_text = $this->request->input('task_text');
        $task->is_checked = $this->request->input('is_checked');
        $task->task_list_id = $this->request->input('task_list_id');
        $task->save();
    }

    public function delete()
    {
        if ($this->request->id) {
            $task = Task::find($this->request->id);
            $task->delete();
        }
    }

}