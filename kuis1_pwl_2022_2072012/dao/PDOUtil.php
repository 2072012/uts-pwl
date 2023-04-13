<?php

//2072012 Jason Himendrian Hofendi
namespace dao;

use PDO;

class PDOUtil
{
    public static function createMySQLConnection(): PDO
    {
        $link = new PDO('mysql:host=localhost;dbname=pwl20222q1', 'root', '');
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
        return $link;
    }
}