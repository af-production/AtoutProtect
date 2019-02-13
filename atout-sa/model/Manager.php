<?php

namespace AtoutSA\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=Licence_bdd;charset=utf8', 'root', '');
        return $db;
    }
}