<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$userId = $_GET['id'];
if(!staffExpedientesExists($userId)){
  header("Location: staffs.php"); die();
}
$staffExpediente = fetchStaffExpediente($_GET['id']);
require_once("models/header.php");
include("nav.php");
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h4><a href="staffExpedienteAgregar.php?id=<?php echo $userId;?>"><span class='glyphicon glyphicon-plus-sign'></span> Agregar Expediente Staff</a></h4>
			<table class="table table-hover table-responsive">
				<tr>
					<th>Primer Entrevista</th>
					<th>Evaluador</th>
					<th>Aceptado</th>
					<th>Conclusiones</th>
					<th>Carta Padres</th>
					<th>Carta Compromiso</th>
					<th>Camp Selección</th>
					<th>Prueba Física</th>
					<th>Carta Recomendación</th>
					<th>Reporte Neg</th>
					<th>Habilidades útiles</th>
					<th>Creación</th>
					<th></th>
				</tr>
				<?php

foreach ($staffExpediente as $v1) {
	if($v1['aceptado']==1){
		$aceptado = "<img src='".$template."img/accept.png'/>";
	}else{
		$aceptado = "<img src='".$template."img/delete.png'/>";
	}
	if($v1['cartaCompromiso']==1){
		$cartaC = "<img src='".$template."img/accept.png'/>";
	}else{
		$cartaC = "<img src='".$template."img/delete.png'/>";
	}
	if($v1['cartaRecomendacion']==1){
		$cartaR = "<img src='".$template."img/accept.png'/>";
	}else{
		$cartaR = "<img src='".$template."img/delete.png'/>";
	}
	if($v1['cartaPadres']==1){
		$cartaP = "<img src='".$template."img/accept.png'/>";
	}else{
		$cartaP = "<img src='".$template."img/delete.png'/>";
	}
	if($v1['campSeleccion']==1){
		$campS = "<img src='".$template."img/accept.png'/>";
	}else{
		$campS = "<img src='".$template."img/delete.png'/>";
	}
	echo "
	<tr id='".$v1['idse']."'>
		<td><a href='staffExpediente.php?id=".$v1['idse']."'>".$v1['primeraEn']."</a></td>
		<td>".$v1['evaluador']."</td>
		<td><a href='#'>".$aceptado."</a></td>
		<td>".$v1['conclusiones']."</td>
		<td>".$cartaP."</td>
		<td>".$cartaC."</td>
		<td>".$campS."</td>
		<td>".$v1['pruebaFisica']."</td>
		<td>".$cartaR."</td>
		<td>".$v1['reporteNeg']."</td>
		<td>".$v1['habilidadesUtiles']."</td>
		<td>".$v1['creacion']."</td>
		<td><a href='staffExpedienteDelete.php?id=".$v1['idse']."'><span class='glyphicon glyphicon-remove'></span></a></td>
	</tr>
	";
}
				?>
			</table>
		</div>
	</div>
</div>
<?php
require_once("models/footer.php");
?>