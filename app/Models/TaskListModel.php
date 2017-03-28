<?php
/**
 * Created by PhpStorm.
 * User: АЙНАЗИК
 * Date: 28.03.2017
 * Time: 11:09
 */

namespace App\Models;


class TaskListModel extends TodoModel
{
    public $id;

    public $name;

    public $countTasks;

    protected $fields = ['id', 'name', 'countTasks'];

    public function __construct(array $data)
    {
        parent::__construct($data);
    }

}