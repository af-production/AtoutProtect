<?php
require('controller/frontend.php');

try {
     if(isset($_GET['action'])) {
        if ($_GET['action'] == 'listLicences') {
            getLicences();
        }elseif ($_GET['action'] == 'listLicenceById') {
            getLicence();
        }elseif ($_GET['action'] == 'connexionUser') {
        	if(isset($_GET['MailUser']))
        	{
        		getUser(); 
        	}else
        	{
    		 	connectUser();
        	}
       	}
    }
    else {
        getLicences();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

