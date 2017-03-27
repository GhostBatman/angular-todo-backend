<?php

namespace App\Repositories\Contracts;

interface TaskRepositoryInterface
{
    public function all();
    public function update();
    public function create();
    public function delete();
}