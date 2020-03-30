<?php
class Users
{
    public $id;
    public $admin;
    public $pseudo;
    public $password;

    public function __construct($pseudo)
    {
        global $db;

        $pseudo = str_secur($pseudo);

        $reqUser = $db->prepare('SELECT *
        FROM users
        WHERE pseudo = ?');
        $reqUser->execute([$pseudo]);

        $data = $reqUser->fetch();

        $this->id = $data['id'];
        $this->admin = $data['admin'];
        $this->pseudo = $pseudo;
        $this->password = $data['password'];
    }

    public static function getAllUsers()
    {
        global $db;

        $reqUsers = $db->prepare('SELECT *
      FROM users');
        $reqUsers->execute([]);

        return $reqUsers->fetchAll();
    }
}
