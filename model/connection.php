<?php
class Connection {
    protected $o_db;
    public function __construct(){
        $params = require "database.php";
        $conStr = sprintf("pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
                $params['host'],
                $params['port'],
                $params['dbname'],
                $params['user'],
                $params['password']);

        $pdo = new \PDO($conStr);

        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        $this->o_db = $pdo;
    }
}
?>