<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$userId = $_GET['id'];
if(!montanistaExists($userId)){
  header("Location: montanistas.php"); die();
}
$montanista = fetchMontanistaDetails($userId);
if(!empty($_POST))
{
  if(updateMontanista($_POST['apellidoP'],$_POST['apellidoM'],$_POST['nombre'],$_POST['nickname'],$_POST['fechaNac'],$_POST['sexo'],$_POST['pais'],$_POST['estado'],$_POST['ciudad'],$_POST['calle'],$_POST['noExt'],$_POST['noInt'],$_POST['colonia'],$_POST['cp'],$_POST['telefono'],$_POST['celular'],$_POST['email'],$_POST['nombreMama'],$_POST['emailM'],$_POST['nombrePapa'],$_POST['emailP'],$_POST['diasAltikamp'],$_POST['nivelExpertiz'],$_POST['obMed'],$_POST['seguroGastosMed'],$_POST['observaciones'],$_POST['clave'],$_POST['contactoEmergencia'],$_POST['telefonoEmergencia'],$_POST['noFolio'],$_POST['colegio'],$userId)){

      $successes[] = "Registro actualizado";

  }else{
    $errors[] = "Error al actualizar";
  }
  $montanista = fetchMontanistaDetails($userId);
} 
require_once("models/header.php");
include("nav.php");
echo resultBlock($errors,$successes);
?>
<div class="container">
  <div class="row">
    <?php echo "<form name='montanista' action='".$_SERVER['PHP_SELF']."?id=".$userId."' method='post'>";?>
    <div class="col-md-6">
      <h3>Datos Generales</h3>
      <div class="form-group">
        <label for="noFolio">Número de Folio</label>
        <input type="text" class="form-control" id="noFolio" name="noFolio" placeholder="noFolio" value="<?php echo $montanista[0]['noFolio']?>">
      </div>
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $montanista[0]['nombre']?>">
      </div>
      <div class="form-group">
        <label for="apellidoP">Apellido Paterno</label>
        <input type="text" class="form-control" id="apellidoP" name="apellidoP" placeholder="Apellido Paterno" value="<?php echo $montanista[0]['apellidoP']?>">
      </div>
      <div class="form-group">
        <label for="apellidoM">Apellido Materno</label>
        <input type="text" class="form-control" id="apellidoM" name="apellidoM" placeholder="Apellido Materno" value="<?php echo $montanista[0]['apellidoM']?>">
      </div>
      <div class="form-group">
        <label for="nickname">NickName</label>
        <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nick name" value="<?php echo $montanista[0]['nickname']?>">
      </div>
      <div class="form-group">
        <label for="colegio">Escuela</label>
        <input type="text" class="form-control" id="colegio" name="colegio" placeholder="Escuela" value="<?php echo $montanista[0]['colegio']?>">
      </div>
      <div class="form-group">
        <label for="nickname">Fecha de Nacimiento</label>
        <input type="text" class="form-control datepicker" id="fechaNac" name="fechaNac" placeholder="Fecha de nacimiento" value="<?php echo $montanista[0]['fechaNac']?>">
      </div>
      <div class="form-group">
        <label for="sexo">Sexo</label>
          <div class="radio">
          <label>
            <input type="radio" name="sexo" id="sexoM" value="1" <?php if($montanista[0]['sexo']==1){echo 'checked';} ?>>
            Masculino
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="sexo" id="sexoF" value="0" <?php if($montanista[0]['sexo']==0){echo 'checked';}?>>
              Femenino
            </label>
          </div>
      <div class="form-group">
        <label for="diasAltikamp">Días en Altikamp</label>
        <input type="text" class="form-control" id="diasAltikamp" name="diasAltikamp" placeholder="Días en Altikamp" value="<?php echo $montanista[0]['diasAltikamp']?>">
      </div>
      <div class="form-group">
        <label for="nivelExpertiz">Nivel de Expertiz</label>
        <input type="text" class="form-control" id="nivelExpertiz" name="nivelExpertiz" placeholder="Nivel de Expertiz" value="<?php echo $montanista[0]['nivelExpertiz']?>">
      </div>
      </div>
      <h3>Ubicación</h3>
      <div class="form-group">
        <label for="pais">País</label>
        <input type="text" class="form-control" id="pais" name="pais" placeholder="pais" value="<?php echo $montanista[0]['pais']?>">
      </div>
      <div class="form-group">
        <label for="estado">Estado</label>
        <input type="text" class="form-control" id="estado" name="estado" placeholder="estado" value="<?php echo $montanista[0]['estado']?>">
      </div>
      <div class="form-group">
        <label for="ciudad">Ciudad</label>
        <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="ciudad" value="<?php echo $montanista[0]['ciudad']?>">
      </div>
      <div class="form-group">
        <label for="colonia">Colonia</label>
        <input type="text" class="form-control" id="colonia" name="colonia" placeholder="colonia" value="<?php echo $montanista[0]['colonia']?>">
      </div>
      <div class="form-group">
        <label for="calle">Calle</label>
        <input type="text" class="form-control" id="calle" name="calle" placeholder="calle" value="<?php echo $montanista[0]['calle']?>">
      </div>
      <div class="form-group">
        <label for="noExt">Número exterior</label>
        <input type="text" class="form-control" id="noExt" name="noExt" placeholder="Número exterior" value="<?php echo $montanista[0]['noExt']?>">
      </div>
      <div class="form-group">
        <label for="noInt">Número interior</label>
        <input type="text" class="form-control" id="noInt" name="noInt" placeholder="Número interior" value="<?php echo $montanista[0]['noInt']?>">
      </div>
      <div class="form-group">
        <label for="cp">Código Postal</label>
        <input type="text" class="form-control" id="cp" name="cp" placeholder="Código Postal" value="<?php echo $montanista[0]['cp']?>">
      </div>
    </div>
    <div class="col-md-6">
      <h3>Datos de Contacto</h3>
      <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" value="<?php echo $montanista[0]['telefono']?>">
      </div>
      <div class="form-group">
        <label for="celular">Celular</label>
        <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular" value="<?php echo $montanista[0]['celular']?>">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $montanista[0]['email']?>">
      </div>
      <div class="form-group">
        <label for="nombreMama">Nombre Madre</label>
        <input type="text" class="form-control" id="nombreMama" name="nombreMama" placeholder="Nombre Madre" value="<?php echo $montanista[0]['nombreMama']?>">
      </div>
      <div class="form-group">
        <label for="emailM">Email Madre</label>
        <input type="text" class="form-control" id="emailM" name="emailM" placeholder="email" value="<?php echo $montanista[0]['emailM']?>">
      </div>
      <div class="form-group">
        <label for="nombrePapa">Nombre Padre</label>
        <input type="text" class="form-control" id="nombrePapa" name="nombrePapa" placeholder="nombrePapa" value="<?php echo $montanista[0]['nombrePapa']?>">
      </div>
      <div class="form-group">
        <label for="emailP">Email Padre</label>
        <input type="text" class="form-control" id="emailP" name="emailP" placeholder="email" value="<?php echo $montanista[0]['emailP']?>">
      </div>
      <div class="form-group">
        <label for="contactoEmergencia">Contacto de Emergencia</label>
        <input type="text" class="form-control" id="contactoEmergencia" name="contactoEmergencia" placeholder="Contacto de Emergencia" value="<?php echo $montanista[0]['contactoEmergencia']?>">
      </div>
      <div class="form-group">
        <label for="telefonoEmergencia">Teléfono de Emergencia</label>
        <input type="text" class="form-control" id="telefonoEmergencia" name="telefonoEmergencia" placeholder="Teléfono de Emergencia" value="<?php echo $montanista[0]['telefonoEmergencia']?>">
      </div>
      <div class="form-group">
        <label for="emailP">Email Padre</label>
        <input type="text" class="form-control" id="emailP" name="emailP" placeholder="email" value="<?php echo $montanista[0]['emailP']?>">
      </div>
      <div class="form-group">
        <label for="obMed">Observaciones Médicas</label>
        <textarea class="form-control" id="obMed" name="obMed" placeholder="Descripción"><?php echo $montanista[0]['obMed']?></textarea>
      </div>
      <div class="form-group">
        <label for="seguroGastosMed">Seguro de Gastos Médicos</label>
        <textarea class="form-control" id="seguroGastosMed" name="seguroGastosMed" placeholder="Seguro de Gastos Médicos"><?php echo $montanista[0]['seguroGastosMed']?></textarea>
      </div>
      <div class="form-group">
        <label for="observaciones">Observaciones</label>
        <textarea class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones Generales"><?php echo $montanista[0]['observaciones']?></textarea>
      </div>
      <div class="form-group">
        <label for="clave">Clave</label>
        <input type="text" class="form-control" id="clave" name="clave" placeholder="clave" value="<?php echo $montanista[0]['clave']?>">
      </div>
    <button type="submit" class="btn btn-default">Guardar</button>
    </div>
    </form>
  </div>
</div>
<script>
$("#fechaNac").datepicker({
  dateFormat:'yy-mm-dd',
  changeMonth: true,
  changeYear: true  
});
</script>
<?php
include_once 'models/footer.php';
?>