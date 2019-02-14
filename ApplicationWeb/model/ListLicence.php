<?php

namespace AtoutSA\Model;

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
        $licence = $db->prepare('SELECT * FROM Licence WHERE IdLicence = '.$getId);
        $licence->execute(array($getId));
        return $licence;
    }

}