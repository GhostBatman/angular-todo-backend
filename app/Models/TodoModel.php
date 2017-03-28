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

    public function toArray($keys)
    {
        $array = [];
        foreach ($this->fields as $field) {
            if ($keys) {
                if (in_array($field, $keys)) {
                    $array[$field] = $this->$field;
                }
            } else {
                $array[$field] = $this->$field;
            }
        }
        return $array;
    }

}