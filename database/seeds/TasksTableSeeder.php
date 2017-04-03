<?php

use Illuminate\Database\Seeder;
use App\Models\DB\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task = new Task();
        $task->task_text = 'learn Angular';
        $task->is_checked = false;
        $task->task_list_id = 1;
        $task->save();
    }
}
