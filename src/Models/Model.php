<?php

namespace App\Models;

use App\Framework\Connection\MysqlDB;
use Doctrine\Common\Inflector\Inflector;

class Model
{
    protected $table;
    protected $db;
    protected $id;

    public function __construct()
    {
        $this->db = new MysqlDB();
        if (!$this->table) {
            $this->table = Inflector::pluralize(
                Inflector::tableize(
                    (new \ReflectionClass($this))->getShortName()
                )
            );
        }
        $this->id = 1;
    }

    public function all()
    {
        $data = $this->db->queryAll("select * from ". $this->table);
        return $data;
    }

    public function first($id)
    {
        $data = $this->db->queryFirst("select * from " . $this->table . " where id=:id LIMIT 1", [':id' => $id]);
        return $data;
    }
}