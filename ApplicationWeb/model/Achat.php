<?php

namespace AtoutProtect\Model;
use \PDO;
require_once("model/Manager.php");

class Achat extends Manager
{
    function achatLicence($IdUtilisateur, $IdLicence, $IdLogiciel) 
    {
		$db = $this->dbConnect();
		$sql = "INSERT INTO acheter(IdUtilisateur ,IdLicence ,IdLogiciel, DateAchat) VALUES (:IdUtilisateur, :IdLicence, :IdLogiciel, DATE(NOW()))";
		try {
			$sth = $db->prepare($sql);

		    $sth->execute(array(":IdUtilisateur" => $IdUtilisateur, ":IdLicence" => $IdLicence, ":IdLogiciel" => $IdLogiciel));
		} catch (PDOException $e) {
			throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
		}
	}
	
}