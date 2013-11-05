<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$staffs = fetchAllStaffs();
require_once("models/header.php");
include("nav.php");
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h4><a href="staffAgregar.php"><span class='glyphicon glyphicon-plus-sign'></span> Agregar Staff</a></h4>
			<table class="table table-hover table-responsive">
				<tr>
					<th>Nombre</th>
					<th>Universidad</th>
					<th>Fecha de Nacimiento</th>
					<th>Carrera</th>
					<th>Fecha de Ingreso</th>
					<th>Estatus</th>
					<th>Camp Participados</th>
					<th>Rango</th>
					<th>Clave</th>
					<th>Email</th>
					<th>Celular</th>
					<th></th>
					<th></th>
				</tr>
				<?php

foreach ($staffs as $v1) {
		if($v1['sexo'] == 1){
			$sexo = "Hombre";
		}else{
			$sexo = "Mujer";
		}
		$id=$v1['id'];
	echo "
	<tr id='".$v1['id']."'>
		<td><a href='staff.php?id=".$v1['id']."'>".$v1['nombre']." ".$v1['apellidoP']." ".$v1['apellidoM']."</a></td>
		<td>".$v1['universidad']."</td>
		<td>".$v1['fechaNac']."</td>
		<td>".$v1['carrera']."</td>
		<td>".$v1['fechaIngreso']."</td>
		<td>".$v1['estatus']."</td>
		<td>".$v1['campParticipados']."</td>
		<td>".$v1['rango']."</td>
		<td>".$v1['clave']."</td>
		<td>".$v1['email']."</td>
		<td>".$v1['celular']."</td>
		<td><a href='staffExpediente.php?id=".$v1['id']."'><span class='glyphicon glyphicon-list'></span></a></td>
		<td><a href='staffDelete.php?id=".$v1['id']."'><span class='glyphicon glyphicon-remove'></span></a></td>
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