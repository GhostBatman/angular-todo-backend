<?php

use Illuminate\Database\Seeder;
use App\TaskList;

class TaskListsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taskList = new TaskList();
        $taskList->name = 'First Tasks';
        $taskList->save();
    }
}
