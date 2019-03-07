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
	$utilisateur = $utilisateurByMail->getUserByMail($_SESSION['MailUser']);
	$data = $utilisateur->fetch();
}

function connectUser()
{
	
	$submit=isset($_POST['submit']) ? $_POST['submit'] : '';
	require('view/frontend/connexion.php');
	$MailUser = isset($_POST['MailUser']) ? $_POST['MailUser'] : '';
	$MdpUser = isset($_POST['MdpUser']) ? $_POST['MdpUser'] : '';
	//$crypt = hashage($MdpUser); 

	if ($submit) 
	{
		$utilisateur = new \AtoutProtect\Model\Utilisateur();
		$utilisateur = $utilisateur->find($MailUser, $MdpUser);

		if ($utilisateur['MailUser']== $MailUser && $utilisateur['MdpUser']== $MdpUser) //$crypt
		{
			$_SESSION['MailUser'] = $MailUser;

			header('Location: index.php');
		}
		else 
		{
			echo '<script type="text/javascript"> alert("Utilisateur ou mot de passe non reconnu "); </script>';   
		}
	}
}

function unconnectUser()
{
	if(isset($_SESSION['MailUser']))
	{
		session_unset();
		session_destroy();
		echo '<body onLoad="alert(\'Déconnecté\')">';
	}
}