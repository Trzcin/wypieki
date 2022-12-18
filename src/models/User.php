<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::get_db();
    }

    public function findOne($name)
    {
        return $this->db->users->findOne(['name' => $name]);
    }

    public function create($user_data)
    {
        $this->db->users->insertOne($user_data);
    }
}
