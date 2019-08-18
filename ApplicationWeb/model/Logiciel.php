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
        $Logiciel = $db->prepare('SELECT * FROM Logiciel WHERE IdLogiciel = :getId');
        $Logiciel->execute(array(':getId'=>$getId));
        return $Logiciel;
    }

    public function getIdLogiciel($nomLogiciel)
    {
        $db = $this->dbConnect();
        $Logiciel = $db->prepare('SELECT IdLogiciel FROM Logiciel WHERE NomLogiciel = :nomLogiciel');
        $Logiciel->execute(array(':nomLogiciel'=>$nomLogiciel));
        $result = $Logiciel->fetch(PDO::FETCH_NUM);
        return $result;
    }
}