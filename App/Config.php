<?php

namespace App;

class Config
{
    public $data;

    protected function __construct()
    {
        $this->data = include __DIR__ . '/../config.php';
    }

    public static function instance(): self
    {
        static $obj = null;

        if (!isset($obj)) {
            return $obj = new self;
        }

        return $obj;
    }
}
