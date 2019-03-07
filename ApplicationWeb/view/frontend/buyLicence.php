<?php 
ob_start();
$styleMenu = '"mainAchat"';
?>

<img class="center" src="public/images/logoAF.png" alt="Image du logo AF" title="LogoAF" />
<div class="h1Center">AF Productions</div>

<section class="main styleAchat">
    <div class="container">
        <div> 
			<?php
			while ($data = $listById->fetch())
			{
			?>	
				<p class="linkToPay">
					Vous avec opté pour la licence <?php echo $data["Wording"];?> dont le montant total à payer est de <?php echo $data["Price"];?> € </br>
					Par quel moyen de paiement souahitez-vous régler votre achat ?
				</p>
				<a class="linkToPay" href="https://www.paypal.com/fr/webapps/mpp/home">
					<img src="public/images/paypal.png" alt="Paiement par paypal"/>
				</a>
				<a class="linkToPay" href="https://hipay.com/fr">
					<img src="public/images/hipay.png" alt="Paiement par Hipay"/>
				</a>

			<?php
			}
			$listById->closeCursor();
			?>
		</div>
	</div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>