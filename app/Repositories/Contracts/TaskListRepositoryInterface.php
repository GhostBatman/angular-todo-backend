<?php

namespace App\Repositories\Contracts;

interface TaskListRepositoryInterface
{
public function all();

public function create(string $newTaskListName);

public function update(int $taskListId);
}