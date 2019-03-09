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
    public static function load(): Config
    {
        static $objCount = 0;
        if ($objCount > 0) {
            return self::$obj;
        }

        $config = new Config();
        $config->data = include __DIR__ . '/../config.php';

        $objCount++;

        self::$obj = $config;

        return $config;

    }
}