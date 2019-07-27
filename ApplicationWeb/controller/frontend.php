<?php

// Chargement des classes
require_once('model/Licence.php');
require_once('model/utilisateur.php');
require_once('model/Logiciel.php');
require_once('model/Achat.php');

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

function getLogiciels()
{
    $ListLogiciels = new \AtoutProtect\Model\Logiciel();
    $list = $ListLogiciels->getLogiciels();
    require('view/frontend/ListLogiciels.php');
}

function getLogiciel()
{
    $ListLogicielById = new \AtoutProtect\Model\Logiciel();
    $LogicielById = $ListLogicielById->getLogiciel($_GET['idLogiciel']);
    require('view/frontend/buyLicence.php');
}

function getUtilisateur()
{
	$utilisateurByMail = new \AtoutProtect\Model\Utilisateur();
	$utilisateur = $utilisateurByMail->getutilisateurByMail($_SESSION['MailUtilisateur']);
	$data = $utilisateur->fetch();
}

function achatLicence(){
	session_start();
	$idLicence 		= $_GET['idLicence'];
	$idLogiciel 	= $_GET['idLogiciel'];
	$IdUtilisateur 	= $_SESSION['IdUtilisateur'];

	$achat = new \AtoutProtect\Model\Achat();
	$achat->achatLicence($IdUtilisateur,$idLicence,$idLogiciel);
	header('Location: index.php?action=achatEffectue&idLogiciel='.$idLogiciel.'&idLicence='.$idLicence);

}

function confirmationAchat(){
	require('view/frontend/confirmationAchat.php'); 
}

function connectUtilisateur()
{
	$inscription = false;
	$submit=isset($_POST['submit']) ? $_POST['submit'] : '';
	require('view/frontend/connexion.php');
	$MailUtilisateur = isset($_POST['MailUtilisateur']) ? $_POST['MailUtilisateur'] : '';
	$MdpUtilisateur = isset($_POST['MdpUtilisateur']) ? hash('gost-crypto', $_POST['MdpUtilisateur']) : '';
	echo $MdpUtilisateur;
	
	if ($submit) 
	{
		$utilisateur = new \AtoutProtect\Model\Utilisateur();
		
		$tabUtilisateur = $utilisateur->find($MailUtilisateur)->fetch();
	
		
		if ($tabUtilisateur['MailUtilisateur']== $MailUtilisateur && $tabUtilisateur['MdpUtilisateur']== $MdpUtilisateur)
		{
			$_SESSION['MailUtilisateur'] = $MailUtilisateur;
			$_SESSION['IdUtilisateur'] = $tabUtilisateur['IdUtilisateur'];
			header('Location: index.php');
		}
		else 
		{
			echo '<script type="text/javascript"> alert("Utilisateur ou mot de passe non reconnu "); </script>';   
		}
	}
}

function inscriptionUtilisateur()
{
	$inscription = true;
	$submit=isset($_POST['submit']) ? $_POST['submit'] : '';
	require('view/frontend/connexion.php');
	$MailUtilisateur = isset($_POST['MailUtilisateur']) ? $_POST['MailUtilisateur'] : '';
	$MdpUtilisateur = isset($_POST['MdpUtilisateur']) ? hash('gost-crypto', $_POST['MdpUtilisateur']) : '';
	$VerifMdp =  isset($_POST['VerifMdp']) ? hash('gost-crypto', $_POST['VerifMdp']) : '';
	$AdresseUtilisateur = isset($_POST['AdresseUtilisateur']) ? $_POST['AdresseUtilisateur'] : '';
	$NomUtilisateur = isset($_POST['NomUtilisateur']) ? $_POST['NomUtilisateur'] : '';

    if ($submit)
    {
        if($MdpUtilisateur == $VerifMdp)
        {
			$tableau = array("MailUtilisateur" => $MailUtilisateur, "MdpUtilisateur" => $MdpUtilisateur, "NomUtilisateur" => $NomUtilisateur, "AdresseUtilisateur" => $AdresseUtilisateur);
			$utilisateur = new \AtoutProtect\Model\Utilisateur();
			$utilisateur->creationUtilisateur($tableau);
			header('Location: index.php?action=connexionUtilisateur');
        }
        else {
        	echo "les deux mots de passes sont différents";
        }
    }
}

function deconnexionUtilisateur()
{
	session_start();
	session_unset();
	session_destroy();
	header('Location: index.php');
	
}