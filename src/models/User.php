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

    public function create(string $name, string $email, string $password_hash)
    {
        $this->db->users->insertOne([
            'name' => $name,
            'email' => $email,
            'password_hash' => $password_hash
        ]);
    }
}
