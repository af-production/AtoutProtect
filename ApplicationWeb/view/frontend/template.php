<?php 
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Atout SA</title>
        <link href="public/css/main.css" rel="stylesheet" /> 
    </head>
        
    <body>
    	<header class=<?= $styleMenu ?> >
    		
    	</header>
        <?= $content ?>

        <section id="footer">
	    	<ul class="icons">
		        <li><a href="https://twitter.com/?lang=fr" class="icon alt fa-twitter"><img src="public/images/twitter.png" alt="Twitter"/></a></li>
		        <li><a href="https://fr-fr.facebook.com/" class="icon alt fa-facebook"><img src="public/images/facebook.png" alt="Facebook"/></a></li>
		        <li><a href="https://github.com/" class="icon alt fa-github"><img src="public/images/github.png" alt="Github"/></a></li>
	   		</ul>
		    <ul class="copyright">
		        <li>&copy; AF Productions</li>
		    </ul>
		</section>

		<!-- Scripts -->
		<script src="../../public/js/jsquery.min.js"></script>
		<script src="../../public/js/jquery.scrolly.min.js"></script>
		<script src="../../public/js/browser.min.js"></script>
		<script src="../../public/js/breakpoints.min.js"></script>
		<script src="../../public/js/util.js"></script>
		<script src="../../public/js/main.js"></script>
    </body>
</html>