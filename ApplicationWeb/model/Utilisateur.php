<?php

namespace AtoutProtect\Model;
use \PDO;
require_once("model/Manager.php");

class Utilisateur extends Manager
{
    public function getUserByMail($MailUser)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM user where MailUser = :MailUser');
        $req->execute(array(':MailUser' => $MailUser));
        return $req;
    }

    function find($MailUser, $MdpUser) 
    {
	  	$db = $this->dbConnect();
	    $sql = "select MailUser, MdpUser from user where MailUser=:MailUser and MdpUser=:MdpUser";
	    try {
	      $sth = $db->prepare($sql);
	      $sth->execute(array(":MailUser" => $MailUser,
	                          ":MdpUser" => $MdpUser));
	      $row = $sth->fetch(PDO::FETCH_ASSOC);
	    } catch (PDOException $e) {
	      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
	    }
	    $pseudo = $row ; 
	    return $pseudo ;
    }
}