<?php

namespace App;


use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class Toast implements Jsonable, Arrayable
{
    protected $title, $body, $type, $timeout;

    public function __construct($title, $body, $type, $timeout)
    {
        $this->title = $title;
        $this->body = $body;
        $this->type = $type;
        $this->timeout = $timeout;
    }

    public function toJson($options=0)
    {
        return json_encode($this->toArray());
    }

    public function toArray()
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
            'type' => $this->type,
            'timeout' => $this->timeout
        ];
    }
}
