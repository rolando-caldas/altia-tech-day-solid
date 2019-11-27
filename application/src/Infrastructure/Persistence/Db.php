<?php


namespace App\Infrastructure\Persistence;

class Db
{
    private static $instance;

    private function __construct()
    {
        $this->db = new \mysqli('mysql', "db_user", "db_password", "db_name");
    }

    public static function getInstance() : \mysqli
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance->db;
    }
}