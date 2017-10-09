<?php

namespace App;

class Db
{
    use Singleton;

    protected $dbh;

    protected function __construct()
    {
        try {
            $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=timeweb', 'root', '');
        } catch (\PDOException $e) {
            throw new \App\Exceptions\Db('Ошибка соединения с БД');
        }

    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);

        if (!$res) throw new \App\Exceptions\Db('Ошибка запроса');

        return $res;
    }

    public function query($sql, $params, $class)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        if (false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }

}