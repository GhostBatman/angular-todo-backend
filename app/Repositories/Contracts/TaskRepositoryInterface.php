<?php

namespace App\Repositories\Contracts;

interface TaskRepositoryInterface
{
    public function all($taskListId);

    public function update(array $task);

    public function create(array $task);

    public function delete($taskId = null);
}