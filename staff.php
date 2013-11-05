<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$userId = $_GET['id'];
if(!staffExists($userId)){
  header("Location: staffs.php"); die();
}
$staff = fetchStaffDetails($userId);
if(!empty($_POST))
{
  if(updateStaff($_POST['apellidoP'],$_POST['apellidoM'],$_POST['nombre'],$_POST['sexo'],$_POST['fechaNac'],$_POST['universidad'],$_POST['carrera'],$_POST['fechaIngreso'],$_POST['estatus'],$_POST['campParticipados'],$_POST['rango'],$_POST['clave'],$_POST['email'],$_POST['celular'],$userId)){


      $successes[] = "Registro actualizado";

  }else{
    $errors[] = "Error al actualizar";
  }
  $staff = fetchStaffDetails($userId);
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
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $staff[0]['nombre']?>">
      </div>
      <div class="form-group">
        <label for="apellidoP">Apellido Paterno</label>
        <input type="text" class="form-control" id="apellidoP" name="apellidoP" placeholder="Apellido Paterno" value="<?php echo $staff[0]['apellidoP']?>">
      </div>
      <div class="form-group">
        <label for="apellidoM">Apellido Materno</label>
        <input type="text" class="form-control" id="apellidoM" name="apellidoM" placeholder="Apellido Materno" value="<?php echo $staff[0]['apellidoM']?>">
      </div>
      <div class="form-group">
        <label for="universidad">Escuela</label>
        <input type="text" class="form-control" id="universidad" name="universidad" placeholder="Escuela" value="<?php echo $staff[0]['universidad']?>">
      </div>
      <div class="form-group">
        <label for="carrera">Carrera</label>
        <input type="text" class="form-control" id="carrera" name="carrera" placeholder="Carrera" value="<?php echo $staff[0]['carrera']?>">
      </div>
      <div class="form-group">
        <label for="fechaNac">Fecha de Nacimiento</label>
        <input type="text" class="form-control datepicker" id="fechaNac" name="fechaNac" placeholder="Fecha de nacimiento" value="<?php echo $staff[0]['fechaNac']?>">
      </div>
      <div class="form-group">
        <label for="sexo">Sexo</label>
          <div class="radio">
          <label>
            <input type="radio" name="sexo" id="sexoM" value="1" <?php if($staff[0]['sexo']==1){echo 'checked';} ?>>
            Masculino
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="sexo" id="sexoF" value="0" <?php if($staff[0]['sexo']==0){echo 'checked';} ?>>
              Femenino
            </label>
          </div>
        </div>
      </div>
    <div class="col-md-6">
      <h3>Datos del Campamento</h3>
      <div class="form-group">
        <label for="fechaIngreso">Fecha de Ingreso</label>
        <input type="text" class="form-control datepicker" id="fechaIngreso" name="fechaIngreso" placeholder="Fecha de nacimiento" value="<?php echo $staff[0]['fechaIngreso']?>">
      </div>
      <div class="form-group">
        <label for="estatus">Estatus</label>
        <input type="text" class="form-control" id="estatus" name="estatus" placeholder="Estatus" value="<?php echo $staff[0]['estatus']?>">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="<?php echo $staff[0]['email']?>">
      </div>
      <div class="form-group">
        <label for="celular">Celular</label>
        <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular" value="<?php echo $staff[0]['celular']?>">
      </div>
      <div class="form-group">
        <label for="campParticipados">Campamentos Participados</label>
        <input type="text" class="form-control" id="campParticipados" name="campParticipados" placeholder="Campamentos Participados" value="<?php echo $staff[0]['campParticipados']?>">
      </div>
      <div class="form-group">
        <label for="rango">Rango</label>
        <input type="text" class="form-control" id="rango" name="rango" placeholder="Rango" value="<?php echo $staff[0]['rango']?>">
      </div>
      <div class="form-group">
        <label for="clave">Clave</label>
        <input type="text" class="form-control" id="clave" name="clave" placeholder="clave" value="<?php echo $staff[0]['clave']?>">
      </div>
    <button type="submit" class="btn btn-default">Guardar</button>
    </div>
    </form>
  </div>
</div>
<script>
$("#fechaNac").datepicker({
  dateFormat:'yy-mm-dd'
});
</script>
<?php
include_once 'models/footer.php';
?>