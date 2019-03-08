<?php

namespace App\Models;

use App\Db;

abstract class Model
{
    protected static $table = '';

    public $id;

    public static function findAll(): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table;

        return $db->query($sql, [], static::class);
    }

    /**
     * @param int $id
     * @return bool|mixed
     */
    public static function findById(int $id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';

        $result = $db->query($sql, [':id' => $id], static::class);

        if ((bool)$result) {
            return reset($result);
        }

        return false;
    }

    public static function getAllLast(int $limit): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $limit;

        return $db->query($sql, [], static::class);
    }

}
