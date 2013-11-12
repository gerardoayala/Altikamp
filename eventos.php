<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$eventos = fetchAllEventos();
require_once("models/header.php");
include("nav.php");
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h4><a href="eventoAgregar.php"><span class='glyphicon glyphicon-plus-sign'></span> Agregar Evento</a></h4>
			<table class="table table-hover table-responsive">
				<tr>
					<th>Empresa</th>
					<th>Fecha Inicio</th>
					<th>Fecha Final</th>
					<th>Hora de Entrada</th>
					<th>Hora de Salida</th>
					<th>Número de Montañistas</th>
					<th>Número de Staff</th>
					<th>Costo por persona</th>
					<th>Creador</th>
					<th></th>
					<th></th>
				</tr>
				<?php

foreach ($eventos as $v1) {
		$id=$v1['id'];
		$trans=$v1['transporte'];
		if($trans == 1){
			$trans = "Si";
		}else{
			$trans = "No";
		}
		$gastM=$v1['gastosMedicos'];
		if($gastM == 1){
			$gastM = "Si";
		}else{
			$gastM = "No";
		}
		$paramed=$v1['paramedico'];
		if($paramed == 1){
			$paramed = "Si";
			$paramed.= " Nombre: ".$v1['nombreParamedico'];
		}else{
			$paramed = "No";
		}
		$alimentos=$v1['alimentos'];
		if($alimentos == 1){
			$alimentos = "Si";
			$alimentos.= " Descripción: ".$v1['nombreAlimentos'];
		}else{
			$paramed = "No";
		}
	echo "
	<tr id='".$v1['id']."'>
		<td><a href='evento.php?id=".$v1['id']."'>".$v1['empresa']." - ".$v1['contacto']."</a></td>
		<td>".$v1['fechaInicio']."</td>
		<td>".$v1['fechaFinal']."</td>
		<td>".$v1['horaInicio']."</td>
		<td>".$v1['horaSalida']."</td>
		<td>".$v1['numeroMontanistas']."</td>
		<td>".$v1['numeroStaff']."</td>
		<td>".$v1['costoPersona']."</td>
		<td>".$v1['creador']."</td>
		<td> <a href='#' class='element' data-toggle='popover' title='' data-content='Transporte: ".$trans."<br>Gastos Médicos: ".$gastM."<br>Paramedico: ".$paramed."  <br>Alimentos: ".$alimentos."<br>Observaciones: ".$v1['observaciones']." ' data-placement='left' role='button' data-original-title='Detalles'><span class='glyphicon glyphicon-search'></span></a>
		</td>
		<td><a href='eventoDelete.php?id=".$v1['id']."'><span class='glyphicon glyphicon-remove'></span></a></td>
	</tr>
	";
}
				?>
			</table>
		</div>
	</div>
</div>
<script>
$('.element').popover({
	html: true
});
</script>
<?php
require_once("models/footer.php");
?>