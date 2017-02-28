<?php

use Illuminate\Database\Seeder;
use App\Task;

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
        $task->taskText = 'learn Angular';
        $task->is_checked = false;
        $task->tab_id = 1;
        $task->save();
    }
}
