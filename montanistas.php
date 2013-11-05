<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$montanistas = fetchAllMontanistas();
require_once("models/header.php");
include("nav.php");
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h4><a href="montanistaAgregar.php"><span class='glyphicon glyphicon-plus-sign'></span> Agregar Montañista</a></h4>
			<table class="table table-hover table-responsive">
				<tr>
					<th>Nombre</th>
					<th>Nickname</th>
					<th>Fecha de Nacimiento</th>
					<th>Ciudad</th>
					<th>Teléfono</th>
					<th>Celular</th>
					<th>Email</th>
					<th>Nivel Expertiz</th>
					<th></th>
					<th></th>
				</tr>
				<?php

foreach ($montanistas as $v1) {
		if($v1['sexo'] == 1){
			$sexo = "Hombre";
		}else{
			$sexo = "Mujer";
		}
		$id=$v1['id'];
	echo "
	<tr id='".$v1['id']."'>
		<td><a href='montanista.php?id=".$v1['id']."'>".$v1['nombre']." ".$v1['apellidoP']." ".$v1['apellidoM']."</a></td>
		<td>".$v1['nickname']."</td>
		<td>".$v1['fechaNac']."</td>
		<td>".$v1['ciudad']."</td>
		<td>".$v1['telefono']."</td>
		<td>".$v1['celular']."</td>
		<td>".$v1['email']."</td>
		<td>".$v1['nivelExpertiz']."</td>
		<td> <a href='#' class='element' data-toggle='popover' title='' data-content='País: ".$v1['pais']." - Estado: ".$v1['estado']." - Ciudad: ".$v1['ciudad']."<br>Dirección: ".$v1['calle']." ".$v1['noExt']."-".$v1['noInt']." ".$v1['colonia']." ".$v1['cp']."<br>Madre: ".$v1['nombreMama']." - ".$v1['emailM']."<br>Padre: ".$v1['nombrePapa']." - ".$v1['emailP']."<br>Días Altikamp: ".$v1['diasAltikamp']."  Sexo: ".$sexo."<br>' data-placement='left' role='button' data-original-title='Detalles'><span class='glyphicon glyphicon-search'></span></a>
		</td>
		<td><a href='montanistaDelete.php?id=".$v1['id']."'><span class='glyphicon glyphicon-remove'></span></a></td>
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