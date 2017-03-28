<?php

namespace App\Models;


abstract class TodoModel
{
    protected $fields = [];

    public function __construct(array $data)
    {
        foreach ($this->fields as $field) {
            if (!array_key_exists($field, $data)) {
                return response('field not found', 300);
            } else {
                $this->setProperty($field, $data[$field]);
            }


        }


    }

    private function setProperty($name, $value)
    {
        $this->$name = $value;
    }


}