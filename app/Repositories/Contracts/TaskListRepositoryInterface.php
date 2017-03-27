<?php

namespace App\Repositories\Contracts;

interface TaskListRepositoryInterface
{
public function all();

public function create();

public function update();
}