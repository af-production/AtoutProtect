<?php

namespace AtoutProtect\Model;
use \PDO;

require_once("model/Manager.php");

class Licence extends Manager
{
    public function getLicences()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM Licence');
        return $req;
    }
    
    public function getLicence($getId)
    {
        $db = $this->dbConnect();
        $licence = $db->prepare('SELECT * FROM Licence WHERE IdLicence = :getId');
        $licence->execute(array(':getId'=>$getId));
        return $licence;
    }

    public function getIdLicence($dureeLicence)
    {
        $db = $this->dbConnect();
        $licence = $db->prepare('SELECT IdLicence FROM Licence WHERE DureeValide = :dureeLicence');
        $licence->execute(array(':dureeLicence'=>$dureeLicence));
        $result = $licence->fetch(PDO::FETCH_NUM);
        return $result;
    }
}