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

    public function insert(): bool
    {
        $db = new Db();
        $props = get_object_vars($this);

        $fields = [];
        $binds = [];
        $data = [];
        foreach ($props as $name => $value) {
            if ('id' === $name) {
                continue;
            }

            $fields[] = $name;
            $binds[] = ':' . $name;
            $data[':' . $name] = $value;
        }

        $sql = 'INSERT INTO ' . static::$table . ' (' . implode(', ', $fields) . ') VALUES (' . implode(', ', $binds) . ')';

        $result = $db->execute($sql, $data);
        $this->id = $db->lastInsertId();

        return $result;
    }

    public function update(): bool
    {
        $db = new Db();
        $props = get_object_vars($this);

        $fields = [];
        $binds = [];
        $data = [];
        foreach ($props as $name => $value) {
            $data[':' . $name] = $value;
            if ('id' === $name) {
                continue;
            }
            $fields[] = $name . '=:' . $name;
        }

        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $fields) . ' WHERE id=:id';

        return $db->execute($sql, $data);
    }
}
