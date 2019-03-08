<?php
require('controller/frontend.php');

try {
     if(isset($_GET['action'])) {
        if ($_GET['action'] == 'listLicences') {
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
       	}elseif($_GET['action'] == 'inscription'){
       		inscriptionUtilisateur();
       	}elseif($_GET['action'] == 'deconnexion'){
       		deconnexionUtilisateur();
       	}
    }
    else {
        getLicences();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

