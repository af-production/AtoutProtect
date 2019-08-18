<?php 
if(!isset($_SESSION)){
	session_start();
}
ob_start();
$styleMenu = '"mainAchat"';
?>

<img class="center" src="public/images/logoAF.png" alt="Image du logo AF" title="LogoAF" />
<div class="h1Center">AF Productions</div>

<section class="main styleAchat">
    <div class="container">
    	<?php 
        echo '<p class="linkToPay"> Votre achat concernant le logiciel '.$Logiciel['NomLogiciel'].' pour une durée de '.$Licence['DureeValide']. 'a bien été effectué. Nous vous demandons de bien vouloir démarrer / redémarrer votre logiciel avec un accès internet afin que la licence soit appliquée.';
			?>


			
	</div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>