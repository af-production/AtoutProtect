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

function getUtilisateur()
{
	$utilisateurByMail = new \AtoutProtect\Model\Utilisateur();
	$utilisateur = $utilisateurByMail->getutilisateurByMail($_SESSION['MailUtilisateur']);
	$data = $utilisateur->fetch();
}

function connectUtilisateur()
{
	$inscription = false;
	$submit=isset($_POST['submit']) ? $_POST['submit'] : '';
	require('view/frontend/connexion.php');
	$MailUtilisateur = isset($_POST['MailUtilisateur']) ? $_POST['MailUtilisateur'] : '';
	$MdpUtilisateur = isset($_POST['MdpUtilisateur']) ? hash('gost-crypto', $_POST['MdpUtilisateur']) : '';
	echo $MdpUtilisateur;
	//$hash = hash('gost-crypto', $passe);
	//$crypt = hashage($MdpUtilisateur); 

	if ($submit) 
	{
		$utilisateur = new \AtoutProtect\Model\Utilisateur();
		
		$tabUtilisateur = $utilisateur->find($MailUtilisateur)->fetch();
		echo '\n';
		var_dump($utilisateur);
		echo '\n';
		echo $tabUtilisateur['MailUtilisateur']== $MailUtilisateur ;
		echo $tabUtilisateur['MdpUtilisateur']== $MdpUtilisateur;
		if ($tabUtilisateur['MailUtilisateur']== $MailUtilisateur && $tabUtilisateur['MdpUtilisateur']== $MdpUtilisateur)
		{
			$_SESSION['MailUtilisateur'] = $MailUtilisateur;
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
			header('Location: index.php?action=connexionutilisateur');
        }
        else {
        	echo "les deux mots de passes sont différents";
        }
    }
}

function deconnexionUtilisateur()
{
	require('view/frontend/ListLicence.php');
	if(isset($_SESSION['MailUtilisateur']))
	{
		session_unset();
		session_destroy();
		echo '<body onLoad="alert(\'Déconnecté\')">';
		header('Location: index.php');
	}else{
		echo "Lol";
	}
}