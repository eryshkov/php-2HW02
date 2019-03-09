<?php

namespace App;

class Config
{
    /**
     * @var array
     */
    public $data;

    /**
     * @var Config
     */
    protected static $obj;

    /**
     * Config constructor.
     */
    protected function __construct()
    {

    }

    /**
     * @return Config
     */
    public static function load(): self
    {
        if (isset(self::$obj)) {
            return self::$obj;
        }

        $config = new self();
        $config->data = include __DIR__ . '/../config.php';

        self::$obj = $config;

        return $config;

    }
}