<?php


namespace App\Infrastructure\Persistence;

class Db
{
    private $db;

    public function __construct()
    {
        $this->db = new \mysqli('mysql', "db_user", "db_password", "db_name");

        if (!$this->db) {
            throw new \Exception("database error");
        }
    }

    public function hashtags() : array
    {
        $hashtags = [];
        $query = $this->db->query('SELECT * FROM hashtag');
        while($hashtag = $query->fetch_object()) {
            $hashtags[] = $hashtag;
        }
        return $hashtags;
    }
}