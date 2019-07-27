<?php 
if(!isset($_SESSION)){
	session_start();
}
$styleMenu = '"main style2"';
$idForLicence = 1;
ob_start();
?>

<img class="center" src="public/images/logoAF.png" alt="Image du logo AF" title="LogoAF" />
<div class="h1Center">AF Productions</div>

<section class="main style3">
    <div class="container">
        <div class="col-6 col-12-medium"> 
            <p style="color: #FFF;">
                Votre licence est expirée, veuillez trouver ci-joint un tableau explicatif des différents logiciels que nous pouvons vous proposer. Une fois votre logiciel choisit, vous devrez sélectionner une durée de vie pour votre licence. Si vous décidez de travailler sans licence, les fonctionnalités Export et Impression seront désactivées.
            </p>
        </div>
         

		<table class="tabLicence">
			<tr>
				<th class="tabLicence">Nom du logiciel</th>
				<th class="tabLicence">Description</th>
				<th class="tabLicence">Sélection</th>
			</tr>
			
			<?php
			while ($data = $list->fetch())
			{
			?>
				<tr>
					<td class="tabLicence" style="width: 140px; text-align: center;"> <?php echo $data['NomLogiciel']; ?></td>
					<td class="tabLicence"> <?php echo $data['DescriptionLogiciel']; ?></td>
					<td class="tabLicence">
						<a class="buttonBuy" href=<?php echo '"index.php?action=listLicences&idLogiciel='.$data['IdLogiciel'].'"';?> >Poursuivre</a>
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