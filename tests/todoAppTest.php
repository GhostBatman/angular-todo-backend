<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class todoAppTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTaskLists()
    {
        $this->seed();

        $this->json('GET', 'api/v1/task-lists')
            ->seeJson([
                "id" => 1,
                'name' => "First Tasks",
            ]);
    }

    public function testTasks()
    {
        $this->seed();

        $this->json('GET', 'api/v1/task-lists/1/tasks')
            ->seeJson([
                "task_text" => 'learn Angular',
                "is_checked" => 0,
                "task_list_id" => 1,
            ]);
    }

}
