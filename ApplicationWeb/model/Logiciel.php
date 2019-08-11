<?php

namespace AtoutProtect\Model;
use \PDO;
require_once("model/Manager.php");

class Logiciel extends Manager
{
    public function getLogiciels()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM Logiciel');
        return $req;
    }
    
    public function getLogiciel($getId)
    {
        $db = $this->dbConnect();
        $licence = $db->prepare('SELECT * FROM Logiciel WHERE IdLogiciel = :getId');
        $licence->execute(array(':getId'=>$getId));
        return $licence;
    }

}