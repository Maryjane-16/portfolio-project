<?php

namespace App\Requests;

class Request
{
    protected $data;

    public function __construct()
    {
        $this->data = $_REQUEST;
    }

    public function input($key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }

    public function all()
    {
        return $this->data;
    }

    public function method()
    {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }

}