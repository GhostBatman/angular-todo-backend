<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class todoAppTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTaskLists()
    {
       $response=$this->call('get','api/v1/task-lists');
        $content = $response->getContent();
        self::assertJson($content);
    }
    public function testTasks(){
        $response=$this->call('get','api/v1/task-lists/1/tasks');
        $content = $response->getContent();
        self::assertJson($content);
    }
}
