<?php 
$styleMenu = '"main style2"';
$idForLicence = 1;
ob_start();
?>

<img class="center" src="public/images/logoAF.png" alt="Image du logo AF" title="LogoAF" />
<div class="h1Center">AF Productions</div>

<section class="main style3">
    <div class="container">
    <!--<div class="row gtr-150"> !-->
        <div class="col-6 col-12-medium"> 
            <p style="color: #FFF;">
                Votre licence est expirée, veuillez trouver ci-joint un tableau explicatif des différentes solutions que nous pouvons vous proposer. Si vous ne choisissez aucune icence, les fonctionnalités Export et Impression seront désactivées.
            </p>
        </div>
      

		
		<form action="connexion.php" method="post" name="formulaire">  
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
	</div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>