<?php

namespace App;

class Config
{
    public $data;

    protected function __construct()
    {

    }

    public static function load(): self
    {
        static $obj = null;

        if (isset($obj)) {
            return $obj;
        }

        $config = new self();
        $config->data = include __DIR__ . '/../config.php';

        $obj = $config;

        return $config;
    }
}
