<?php
session_start();
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
include ('hashage.php');
//require_once "includes\DemandeurDAO.php";
?>


<form action="index.php" method="post" name="formulaire">  
	<p> Veuillez remplir le formulaire</p>
	<p> Adresse mail <br /><input type="text" name="MailUser" placeholder="utilisateur" required/></p>
	<p> Mot de passe <br /><input type="password" name="MdpUser" value="" placeholder="MotPa$$e" required/></p>
	<input type="submit" name="submit" value="Se connecter"></br></br>
</form>

<?php
	/*if(isset($_GET['inscription']))
	{
		echo"<b><font color='orange'> Vous venez bien de vous inscrire, veuillez vous connecter.</font></b></br>";
	}  */       

	$MailUser = isset($_POST['MailUser']) ? $_POST['MailUser'] : '';
	$MdpUser = isset($_POST['MdpUser']) ? $_POST['MdpUser'] : '';
	//$crypt = hashage($MdpUser); 

	if ($submit) 
	{
		$utilisateur = new utilisateur();
		$utilisateur = $utilisateur->find($MailUser, $MdpUser);

		if ($demandeur['MailUser']== $MailUser && $demandeur['MdpUser']== $MdpUser) //$crypt
		{
			$_SESSION['MailUser'] = $MailUser;

			header('Location: index.php');
		}
		else 
		{
			echo '<script type="text/javascript"> alert("Utilisateur ou mot de passe non reconnu "); </script>';   
		}
	}
?>