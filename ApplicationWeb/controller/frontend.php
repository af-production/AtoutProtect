<?php

// Chargement des classes
require_once('model/ListLicence.php');
require_once('model/utilisateur.php');

function getLicences()
{
    $ListLicence = new \AtoutProtect\Model\Licence();
    $list = $ListLicence->getLicences();
    require('view/frontend/ListLicence.php');
}

function getLicence()
{
    $ListLicenceById = new \AtoutProtect\Model\Licence();
    $listById = $ListLicenceById->getLicence($_GET['idLicence']);
    require('view/frontend/buyLicence.php');
}

function getUser()
{
	$utilisateurByMail = new \AtoutProtect\Model\Utilisateur();
	$utilisateur = $utilisateurByMail->getUserByMail($_GET['mailUser']);
	$data = $utilisateur->fetch();
	require('view/frontend/connexion.php');
}

function connectUser()
{
	require('view/frontend/connexion.php');
	
}