<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$id = $_GET['id'];
$evento = fetchEventoDetails($id);
require_once("models/header.php");
include("nav.php");
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<ul class="nav nav-tabs">
			  <li><a href="#home" data-toggle="tab">Datos Generales del Evento</a></li>
			  <li><a href="#profile" data-toggle="tab">Actividades Asignadas</a></li>
			  <li><a href="#messages" data-toggle="tab">Staff Asignado</a></li>
			  <li><a href="#settings" data-toggle="tab">Montañistas Asignados</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
			  <div class="tab-pane active" id="home">...</div>
			  <div class="tab-pane" id="profile">..a.</div>
			  <div class="tab-pane" id="messages">...</div>
			  <div class="tab-pane" id="settings">...</div>
			</div>
		</div>
	</div>
</div>
<?php 
require_once("models/footer.php");
?>