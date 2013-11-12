<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
if(!empty($_POST))
{
  if(createEvento($_POST['empresa'],$_POST['contacto'],$_POST['fechaInicio'],$_POST['fechaFinal'],$_POST['horaInicio'],$_POST['horaSalida'],$_POST['numeroMontanistas'],$_POST['costoPersona'],$_POST['becas'],$_POST['numeroStaff'],$_POST['transporte'],$_POST['gastosMedicos'],$_POST['paramedicos'],$_POST['nombreParamedicos'],$_POST['alimentos'],$_POST['nombreAlimentos'],$_POST['observaciones'],$loggedInUser->displayname)){
      header("Location: eventos.php"); die();
  }else{
    $errors[] = "Error al crear";
  }
} 
require_once("models/header.php");
echo "<link href='".$template."css/jquery.ui.timepicker.css' rel='stylesheet' type='text/css' /><script type='text/javascript' src='".$template."js/jquery.ui.position.min.js'></script><script src='".$template."js/jquery.ui.timepicker.js' type='text/javascript'></script>";
include("nav.php");
echo resultBlock($errors,$successes);
?>
<div class="container">
  <div class="row">
    <?php echo "<form name='montanista' action='".$_SERVER['PHP_SELF']."' method='post'>";?>
    <div class="col-md-6">
      <h3>Datos Generales</h3>
      <div class="form-group">
        <label for="empresa">Empresa</label>
        <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Empresa" value="">
      </div>
      <div class="form-group">
        <label for="contacto">Contacto</label>
        <input type="text" class="form-control" id="contacto" name="contacto" placeholder="Contacto con la empresa" value="">
      </div>
      <div class="form-group">
        <label for="fechaInicio">Fecha Inicio</label>
        <input type="text" class="form-control datepicker" id="fechaInicio" name="fechaInicio" placeholder="Fecha de Inicio" value="">
      </div>
      <div class="form-group">
        <label for="universidad">Fecha Fin</label>
        <input type="text" class="form-control datepicker" id="fechaFinal" name="fechaFinal" placeholder="Fecha Final" value="">
      </div>
      <div class="form-group">
        <label for="horaInicio">Hora de Inicio</label>
        <input type="text"  class="form-control" id="horaInicio" name="horaInicio" placeholder="Hora de Inicio" value="" />
      </div>
      <div class="form-group">
        <label for="horaSalida">Hora de Salida</label>
        <input type="text"  class="form-control" id="horaSalida" name="horaSalida" placeholder="Hora de Salida" value="" />
      </div>
      <div class="form-group">
        <label for="fechaIngreso">Número de Montañistas</label>
        <input type="text" class="form-control" id="numeroMontanistas" name="numeroMontanistas" placeholder="Número de Montañistas" value="">
      </div>
      <div class="form-group">
        <label for="estatus">Costo por Persona</label>
        <input type="text" class="form-control" id="costoPersona" name="costoPersona" placeholder="Costo por Persona" value="">
      </div>
      <div class="form-group">
        <label for="becas">Becas</label>
        <input type="text" class="form-control" id="becas" name="becas" placeholder="Becas" value="">
      </div>
      <div class="form-group">
        <label for="fechaIngreso">Número de Staff</label>
        <input type="text" class="form-control" id="numeroStaff" name="numeroStaff" placeholder="Número de Staff" value="">
      </div>
      </div>
    <div class="col-md-6">
      <h3>Extras</h3>
      <div class="form-group">
        <label for="gastosMedicos">Gastos de Seguro Médico</label>
        <select name="gastosMedicos" id="gastosMedicos" class="form-control" >
          <option value="">Selecciona una opción</option>
          <option value="1">Si</option>
          <option value="0">No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="paramedicos">Paramedicos</label>
        <select name="paramedicos" id="paramedicos" class="form-control" >
          <option value="">Selecciona una opción</option>
          <option value="1">Si</option>
          <option value="0">No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="nombreParamedicos">Nombre Paramédico</label>
        <input type="text" class="form-control" id="nombreParamedicos" name="nombreParamedicos" placeholder="Nombre Paramédico" value="">
      </div>
      <div class="form-group">
        <label for="transporte">Transporte</label>
        <select name="transporte" class="form-control" >
          <option value="">Selecciona una opción</option>
          <option value="1">Si</option>
          <option value="0">No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="alimentos">Alimentos</label>
        <select name="alimentos" class="form-control" >
          <option value="">Selecciona una opción</option>
          <option value="1">Si</option>
          <option value="0">No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="nombreAlimentos">Nombre Alimentos</label>
        <input type="text" class="form-control" id="nombreAlimentos" name="nombreAlimentos" placeholder="Nombre Alimentos" value="">
      </div>
      <div class="form-group">
        <label for="observaciones">Observaciones</label>
        <textarea class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones" ></textarea>
      </div>
    <button type="submit" class="btn btn-default">Guardar</button>
    </div>
    </form>
  </div>
</div>
 <script type="text/javascript">
            $(document).ready(function() {
                $('#horaSalida').timepicker( {
                    showAnim: 'blind'
                } );
                 $('#horaInicio').timepicker( {
                    showAnim: 'blind'
                } );
                $("#fechaInicio").datepicker({
                  dateFormat:'yy-mm-dd',
                  changeMonth: true,
                  changeYear: true  
                });
                $("#fechaFinal").datepicker({
                  dateFormat:'yy-mm-dd',
                  changeMonth: true,
                  changeYear: true  
                });
            });
        </script>
<script>
</script>

 <script>
    var form = $('form');
      form.validate({
        rules: {
            'empresa': {
                required: true,
                maxlength: '45'
            },
            'contacto': {
                required: true,
                maxlength: '100'
            },
            'fechaInicio': {
                required: true
            },
            'fechaFinal': {
                required: true
            },
            'horaInicio': {
                required: true
            },
            'horaSalida': {
                required: true
            },
            'numeroMontanistas': {
                digits:true,
                required: true,
                maxlength: '3'
            },
            'costoPersona': {
                digits: true,
                required: true,
                maxlength: '11'
            },
            'becas': {
                digits: true,
                maxlength: '11'
            },
            'numeroStaff': {
                digits: true,
                required: true,
                maxlength: '3'
            },
            'transporte': {
                required: true
            },
            'gastosMedicos': {
                required: true
            },
            'paramedicos': {
                required: true
            },
            'alimentos': {
                required: true
            },
            'observaciones': {
                maxlength: '1000'
            },
          }
      });
  </script>
<?php
include_once 'models/footer.php';
?>