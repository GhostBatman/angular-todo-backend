<?php

namespace App\Repositories\Contracts;

interface TaskRepositoryInterface
{
    /**
     * @param int $taskListId
     * @return mixed
     */
    public function all(int $taskListId);

    /**
     * @param array $task
     * @return mixed
     */
    public function update(array $task);

    /**
     * @param array $task
     * @return mixed
     */
    public function create(array $task);

    /**
     * @param int|null $taskId
     * @return mixed
     */
    public function delete(int $taskId = null);
}