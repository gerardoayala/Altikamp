<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
if(!empty($_POST))
{
  if(createStaff($_POST['apellidoP'],$_POST['apellidoM'],$_POST['nombre'],$_POST['sexo'],$_POST['fechaNac'],$_POST['universidad'],$_POST['carrera'],$_POST['fechaIngreso'],$_POST['estatus'],$_POST['campParticipados'],$_POST['rango'],$_POST['clave'],$_POST['email'],$_POST['celular'])){
      header("Location: staffs.php"); die();
  }else{
    $errors[] = "Error al crear";
  }
} 
require_once("models/header.php");
include("nav.php");
echo resultBlock($errors,$successes);
?>
<div class="container">
  <div class="row">
    <?php echo "<form name='montanista' action='".$_SERVER['PHP_SELF']."' method='post'>";?>
    <div class="col-md-6">
      <h3>Datos Generales</h3>
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="">
      </div>
      <div class="form-group">
        <label for="apellidoP">Apellido Paterno</label>
        <input type="text" class="form-control" id="apellidoP" name="apellidoP" placeholder="Apellido Paterno" value="">
      </div>
      <div class="form-group">
        <label for="apellidoM">Apellido Materno</label>
        <input type="text" class="form-control" id="apellidoM" name="apellidoM" placeholder="Apellido Materno" value="">
      </div>
      <div class="form-group">
        <label for="universidad">Escuela</label>
        <input type="text" class="form-control" id="universidad" name="universidad" placeholder="Escuela" value="">
      </div>
      <div class="form-group">
        <label for="carrera">Carrera</label>
        <input type="text" class="form-control" id="carrera" name="carrera" placeholder="Carrera" value="">
      </div>
      <div class="form-group">
        <label for="fechaNac">Fecha de Nacimiento</label>
        <input type="text" class="form-control datepicker" id="fechaNac" name="fechaNac" placeholder="Fecha de nacimiento" value="">
      </div>
      <div class="form-group">
        <label for="sexo">Sexo</label>
          <div class="radio">
          <label>
            <input type="radio" name="sexo" id="sexoM" value="1" checked>
            Masculino
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="sexo" id="sexoF" value="0">
              Femenino
            </label>
          </div>
        </div>
      </div>
    <div class="col-md-6">
      <h3>Datos del Campamento</h3>
      <div class="form-group">
        <label for="fechaIngreso">Fecha de Ingreso</label>
        <input type="text" class="form-control datepicker" id="fechaIngreso" name="fechaIngreso" placeholder="Fecha de nacimiento" value="">
      </div>
      <div class="form-group">
        <label for="estatus">Estatus</label>
        <input type="text" class="form-control" id="estatus" name="estatus" placeholder="Estatus" value="">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="">
      </div>
      <div class="form-group">
        <label for="celular">Celular</label>
        <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular" value="">
      </div>
      <div class="form-group">
        <label for="campParticipados">Campamentos Participados</label>
        <input type="text" class="form-control" id="campParticipados" name="campParticipados" placeholder="Campamentos Participados" value="">
      </div>
      <div class="form-group">
        <label for="rango">Rango</label>
        <input type="text" class="form-control" id="rango" name="rango" placeholder="Rango" value="">
      </div>
      <div class="form-group">
        <label for="clave">Clave</label>
        <input type="text" class="form-control" id="clave" name="clave" placeholder="clave" value="">
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
$("#fechaIngreso").datepicker({
  dateFormat:'yy-mm-dd',
  changeMonth: true,
  changeYear: true  
});
</script>

 <script>
    var form = $('form');
      form.validate({
        rules: {
            'nombre': {
                required: true,
                letters:true,
                maxlength: '50'
            },
            'apellidoP': {
                required: true,
                letters:true,
                maxlength: '50'
            },
            'apellidoM': {
                required: true,
                letters:true,
                maxlength: '50'
            },
            'universidad': {
                required: true,
                maxlength: '45'
            },
            'fechaNac': {
                required: true
            },
            'fechaIngreso': {
                required: true
            },
            'celular': {
                number:true,
                required: true,
                maxlength: '13'
            },
            'email': {
                email:true,
                required: true,
                maxlength: '50'
            },
            'rango': {
                digits: true,
                maxlength: '10'
            },
            'clave': {
                required: true,
                maxlength: '10'
            },
          }
      });
  </script>
<?php
include_once 'models/footer.php';
?>