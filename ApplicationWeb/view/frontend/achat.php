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
        echo 'Achat' ;
        //header('Location: index.php?action=achatEffectue&idLogiciel='.$idLogiciel.'&idLicence='.$idLicence);
			?>


			
	</div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>