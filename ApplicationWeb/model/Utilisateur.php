<?php

namespace AtoutProtect\Model;

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
}