<?php
namespace App\Repositories;

use App\Repositories\Contracts\TaskRepositoryInterface;
use App\Models\DB\Task;
use App\Models\TaskModel;


class TaskRepository implements TaskRepositoryInterface
{
    protected $task;

    public function all(int $taskListId)
    {
        $records = Task::where('task_list_id', '=', $taskListId)->get();
        $model = [];
        foreach ($records as $record) {
            $task = new TaskModel($record->toArray());
            array_push($model, $task);
        }
        return $model;
    }

    public function update(array $task)
    {
        $this->task = Task::find($task['id']);
        $this->task->task_text = $task['task_text'];
        $this->task->is_checked = $task['is_checked'];
        $this->task->task_list_id = $task['task_list_id'];
        $this->task->save();
    }

    public function create(array $task)
    {
        $this->task = new Task();
        $this->task->task_text = $task['task_text'];
        $this->task->is_checked = $task['is_checked'];
        $this->task->task_list_id = $task['task_list_id'];
        $this->task->save();
    }

    public function delete(int $taskId = null)
    {
        if ($taskId !== null) {
            $this->task = Task::find($taskId);
            $this->task->delete();
        }
    }

}