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
			  <li class="active"><a href="#home" data-toggle="tab">Datos Generales del Evento</a></li>
			  <li><a href="#profile" data-toggle="tab">Actividades Asignadas</a></li>
			  <li><a href="#messages" data-toggle="tab">Staff Asignado</a></li>
			  <li><a href="#settings" data-toggle="tab">Montañistas Asignados</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
			  <div class="tab-pane active" id="home">
<div class="container">
  <div class="row">
    <?php echo "<form name='montanista' action='".$_SERVER['PHP_SELF']."' method='post'>";?>
    <div class="col-md-6">
      <h3>Datos Generales</h3>
      <div class="form-group">
        <label for="empresa">Empresa</label>
        <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Empresa" value="<?php echo $evento[0]['empresa']?>">
      </div>
      <div class="form-group">
        <label for="contacto">Contacto</label>
        <input type="text" class="form-control" id="contacto" name="contacto" placeholder="Contacto con la empresa" value="<?php echo $evento[0]['contacto']?>">
      </div>
      <div class="form-group">
        <label for="fechaInicio">Fecha Inicio</label>
        <input type="text" class="form-control datepicker" id="fechaInicio" name="fechaInicio" placeholder="Fecha de Inicio" value="<?php echo $evento[0]['fechaInicio']?>">
      </div>
      <div class="form-group">
        <label for="universidad">Fecha Fin</label>
        <input type="text" class="form-control datepicker" id="fechaFinal" name="fechaFinal" placeholder="Fecha Final" value="<?php echo $evento[0]['fechaFinal']?>">
      </div>
      <div class="form-group">
        <label for="horaInicio">Hora de Inicio</label>
        <input type="text"  class="form-control" id="horaInicio" name="horaInicio" placeholder="Hora de Inicio" value="<?php echo $evento[0]['horaInicio']?>" />
      </div>
      <div class="form-group">
        <label for="horaSalida">Hora de Salida</label>
        <input type="text"  class="form-control" id="horaSalida" name="horaSalida" placeholder="Hora de Salida" value="<?php echo $evento[0]['horaSalida']?>" />
      </div>
      <div class="form-group">
        <label for="fechaIngreso">Número de Montañistas</label>
        <input type="text" class="form-control" id="numeroMontanistas" name="numeroMontanistas" placeholder="Número de Montañistas" value="<?php echo $evento[0]['numeroMontanistas']?>">
      </div>
      <div class="form-group">
        <label for="estatus">Costo por Persona</label>
        <input type="text" class="form-control" id="costoPersona" name="costoPersona" placeholder="Costo por Persona" value="<?php echo $evento[0]['costoPersona']?>">
      </div>
      <div class="form-group">
        <label for="becas">Becas</label>
        <input type="text" class="form-control" id="becas" name="becas" placeholder="Becas" value="<?php echo $evento[0]['becas']?>">
      </div>
      <div class="form-group">
        <label for="fechaIngreso">Número de Staff</label>
        <input type="text" class="form-control" id="numeroStaff" name="numeroStaff" placeholder="Número de Staff" value="<?php echo $evento[0]['numeroStaff']?>">
      </div>
      </div>
    <div class="col-md-6">
      <h3>Extras</h3>
      <div class="form-group">
        <label for="gastosMedicos">Gastos de Seguro Médico</label>
        <?php
        $che = "";
        $che1 = "";
        if ($evento[0]['transporte']==1){
        	$che = "selected='selected'";
        }else{
        	$che1 = "selected='selected'";
        }?>
        <select name="gastosMedicos" id="gastosMedicos" class="form-control" >
          <option value="">Selecciona una opción</option>
          <option value="1" <?php echo $che;?> >Si</option>
          <option value="0" <?php echo $che1;?> >No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="paramedicos">Paramedicos</label>
        <?php
        $che = "";
        $che1 = "";
        if ($evento[0]['transporte']==1){
        	$che = "selected='selected'";
        }else{
        	$che1 = "selected='selected'";
        }?>
        <select name="paramedicos" id="paramedicos" class="form-control" >
          <option value="">Selecciona una opción</option>
          <option value="1" <?php echo $che;?> >Si</option>
          <option value="0" <?php echo $che1;?> >No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="nombreParamedicos">Nombre Paramédico</label>
        <input type="text" class="form-control" id="nombreParamedicos" name="nombreParamedicos" placeholder="Nombre Paramédico" value="<?php echo $evento[0]['nombreParamedico']?>">
      </div>
      <div class="form-group">
        <label for="transporte">Transporte</label>  
        <?php
        $che = "";
        $che1 = "";
        if ($evento[0]['transporte']==1){
        	$che = "selected='selected'";
        }else{
        	$che1 = "selected='selected'";
        }?>
        <select name="transporte" class="form-control" >
          <option value="">Selecciona una opción</option>
          <option value="1" <?php echo $che;?> >Si</option>
          <option value="0" <?php echo $che1;?> >No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="alimentos">Alimentos</label>
        <?php
        $che = "";
        $che1 = "";
        if ($evento[0]['alimentos']==1){
        	$che = "selected='selected'";
        }else{
        	$che1 = "selected='selected'";
        }?>
        <select name="alimentos" class="form-control" >
          <option value="">Selecciona una opción</option>
          <option value="1" <?php echo $che;?> >Si</option>
          <option value="0" <?php echo $che1;?> >No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="nombreAlimentos">Nombre Alimentos</label>
        <input type="text" class="form-control" id="nombreAlimentos" name="nombreAlimentos" placeholder="Nombre Alimentos" value="<?php echo $evento[0]['nombreAlimentos']?>">
      </div>
      <div class="form-group">
        <label for="observaciones">Observaciones</label>
        <textarea class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones" ><?php echo $evento[0]['observaciones']?></textarea>
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
  </script></div>
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