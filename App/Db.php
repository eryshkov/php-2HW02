<?php

namespace App;

class Db
{
    /**
     * @var \PDO
     */
    protected $dbh;

    /**
     * Db constructor.
     */
    public function __construct()
    {
        $dsn = 'mysql:host=php-2hw01.mac;port=8889;dbname=php2hw01';
        $this->dbh = new \PDO($dsn, 'eug', '123');
        $this->dbh->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    }


    /**
     * @param string $sql
     * @param array $params
     * @param null $class
     * @return array
     */
    public function query(string $sql, array $params = [], $class = null): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        $data = $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        return $data;
    }

    /**
     * @param string $sql
     * @param array $params
     * @return bool
     */
    public function execute(string $sql, array $params = []): bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }
}
