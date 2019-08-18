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

	function collecterAchat($MailUtilisateur, $NomLogiciel)
	{
		$db = $this->dbConnect();
		$sql = "SELECT u.MailUtilisateur, l.NomLogiciel, d.DureeValide, a.DateAchat, a.AdresseMac FROM acheter a, utilisateur u, logiciel l, licence d WHERE a.IdUtilisateur = u.IdUtilisateur AND a.IdLogiciel = l.IdLogiciel AND a.IdLicence = d.IdLicence AND l.NomLogiciel = :NomLogiciel AND u.MailUtilisateur = :MailUtilisateur";
		try {
	    	$sth = $db->prepare($sql);
	        $sth->execute(array(":NomLogiciel" => $NomLogiciel, ":MailUtilisateur" => $MailUtilisateur));
	        $rows = $sth->fetchAll(PDO::FETCH_NUM);
	        
	    } catch (PDOException $e) {
	        throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
	    }
	    	    
	    return $rows;
	}

	function insererMac($idUtilisateur, $idLicence, $idLogiciel, $MacAdress)
	{
		$db = $this->dbConnect();
		$sql = "UPDATE acheter
				SET AdresseMac = :MacAdress 
				WHERE idUtilisateur = :idUtilisateur
				AND idLicence = :idLicence
				AND idLogiciel = :idLogiciel";
		try {
	    	$sth = $db->prepare($sql);
	        $sth->execute(array(":MacAdress" => $MacAdress, ":idLogiciel" => $idLogiciel, ":idUtilisateur" => $idUtilisateur, ":idLicence" => $idLicence));
	        
	    } catch (PDOException $e) {
	        throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
	    }
	    $result = $sth->fetch(PDO::FETCH_NUM); 
	    return $result;
	}
}