<?php

namespace dao;
//2072012 Jason Himendrian Hofendi
use entity\User;
use PDO;

class UserDao
{
    public function login($username, $password):bool|User
    {
        $link = PDOUtil::createMySQLConnection();
        $query = "SELECT id, name, username FROM mq_user WHERE username = ? AND password = MD5(?)";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $password);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $user = $stmt->fetchObject(User::class);
        $link = null;
        return $user;
    }
}