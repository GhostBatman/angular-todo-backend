<?php
/**
 * Created by PhpStorm.
 * User: Murat
 * Date: 28.03.2017
 * Time: 11:02
 */

namespace App\Models;


class TaskModel extends TodoModel
{
    public $id;

    public $task_text;

    public $is_checked;

    public $task_list_id;

    protected $fields = ["id", "task_text", "is_checked", "task_list_id"];

    public function __construct(array $data)
    {
        parent::__construct($data);
    }
}