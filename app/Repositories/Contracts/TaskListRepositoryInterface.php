<?php

namespace App\Repositories\Contracts;

interface TaskListRepositoryInterface
{

    /**
     * @return mixed
     */
    public function all();

    /**
     * @param string $newTaskListName
     * @return mixed
     */
    public function create(string $newTaskListName);

    /**
     * @param int $taskListId
     * @return mixed
     */
    public function update(int $taskListId);
}