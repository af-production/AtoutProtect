<?php
require('controller/frontend.php');

try {
     if(isset($_GET['action'])) {
        if ($_GET['action'] == 'listLogiciels') {
            getLogiciels();
        }elseif ($_GET['action'] == 'logiciel') {
            getLogiciel();
        }elseif ($_GET['action'] == 'acheter') {
            achatLicence();
        }elseif ($_GET['action'] == 'achatEffectue'){
            confirmationAchat();
        }elseif ($_GET['action'] == 'listLicences') {
            getLicences();
        }elseif ($_GET['action'] == 'listLicenceById') {
            getLicence();
        }elseif ($_GET['action'] == 'connexionUtilisateur') {
        	if(isset($_GET['MailUtilisateur']))
        	{
        		getUtilisateur(); 
        	}else
        	{
    		 	connectUtilisateur();
        	}
       	}elseif ($_GET['action'] == 'inscription'){
       		inscriptionUtilisateur();
       	}elseif ($_GET['action'] == 'deconnexion'){
       		deconnexionUtilisateur();
       	}elseif ($_GET['action'] == 'collecteAchat') {
            collecteAchat();
        }
        elseif ($_GET['action'] == 'insertMac') {
            insertMac();
        }
    }
    else {
        getLogiciels();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

