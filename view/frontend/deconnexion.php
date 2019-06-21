<?php

	if(isset($_SESSION['MailUtilisateur']))
	{
		session_unset();
		session_destroy();
		header('Location: index.php');
	}else{
		echo "Session introuvable";
	}