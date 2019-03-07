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
         

		<table class="tabLicence">
			<tr>
				<th class="tabLicence">Licence</th>
				<th class="tabLicence">Description</th>
				<th class="tabLicence">Prix</th>
				<th class="tabLicence">Achat</th>
			</tr>
			
			<?php
			while ($data = $list->fetch())
			{
			?>
			<tr>
				<td class="tabLicence" style="width: 140px; text-align: center;"> <?php echo $data['Wording']; ?></td>
				<td class="tabLicence"> <?php echo $data['Description']; ?></td>
				<td class="tabLicence" style="width: 70px; border-right: 1px solid #ddd; text-align: center;"> <?php echo $data['Price']." €"; ?></td>
				<td class="tabLicence">
					<a href=<?php echo 'index.php?action=listLicenceById&idLicence='.$data['IdLicence']; ?> class="buttonBuy">Acheter</a>
				</td>
			</tr>
			<?php
			$idForLicence++;
			}				
			$list->closeCursor();
			?>
		</table>
	</div>

	
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>