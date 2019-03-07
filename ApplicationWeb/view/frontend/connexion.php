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
            <p class="fondGris">
                Veuillez vous connecter afin d'effectuer votre achat.
            </p>
        </div>
      
		<form action="#" method="post" name="formulaire">  
			<p class="fondGris"> 
				Adresse mail <br /><input class="champFormulaire" type="text" name="MailUser" placeholder="exemple@mail.com" required/>
				Mot de passe <br /><input class="champFormulaire" type="password" name="MdpUser" value="" placeholder="MotPa$$e" required/>
			</p>
			<input type="submit" name="submit" value="Se connecter"></br></br>
		</form>

		<?php
			/*if(isset($_GET['inscription']))
			{
				echo"<b><font color='orange'> Vous venez bien de vous inscrire, veuillez vous connecter.</font></b></br>";
			}  */       

			
		?>
	</div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>