<?php 
ob_start();
$styleMenu = '"mainAchat"';
?>

<img class="center" src="public/images/logoAF.png" alt="Image du logo AF" title="LogoAF" />
<div class="h1Center">AF Productions</div>

<section class="main styleAchat">
    <div class="container">
        
			<?php
			while ($data = $listById->fetch())
			{
			?>	
				<p class="linkToPay">
					Vous avec opté pour la licence <?php echo $data["Libelle"];?> dont le montant total à payer est de <?php echo $data["Prix"];?> € </br>
					Par quel moyen de paiement souhaitez-vous régler votre achat ?
				</p>

				<paypal>
					<script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
					<script>paypal.Buttons().render('paypal');</script>
				</paypal>
				<hipay>
					<a class="linkToPay" href="https://hipay.com/fr">
						<img src="public/images/hipay.png" alt="Paiement par Hipay"/>
					</a>
				</hipay>
				
			<?php
			}
			$listById->closeCursor();
			?>
	</div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>