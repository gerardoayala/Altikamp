<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
include("nav.php");

echo "<div class='container index'>
		
		<img src='".$template."img/logo.gif'/>
		<h1>Bienvenido al sistema de administración Altikamp</h1>
		<p>En este sistema tu podras... </p>
		</div>";

require_once("models/footer.php");
?>
