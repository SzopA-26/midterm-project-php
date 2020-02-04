<?php

namespace App\Framework\Connection;

use App\Framework\Utilities\Config;

class MysqlDB extends DB
{
    public function __construct()
    {
        $host = Config::read('database.mysql.host');
        $database = Config::read('database.mysql.database');
        $charset = Config::read('database.mysql.charset');
        $this->pdo = new \PDO(
            "mysql:host=${host};dbname=${database};charset=${charset}",
            Config::read('database.mysql.username'),
            Config::read('database.mysql.password')
        );
    }
}