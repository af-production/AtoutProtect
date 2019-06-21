<?php 
$styleMenu = '"main style2"';
ob_start();
?>

<img class="center" src="public/images/logoAF.png" alt="Image du logo AF" title="LogoAF" />
<div class="h1Center">AF Productions</div>

<section class="main style3">
    <div class="container">
    <!--<div class="row gtr-150"> !-->
        <div class="col-6 col-12-medium"> 
        	<p class="fondGris">
                Voici votre licence :
            </p>
            
        </div>
       
		<p class="fondGris"> 
			
			<?php /*echo $DtDateFin;
					echo $mac;	*/			?>

		</p>
		
	</div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>