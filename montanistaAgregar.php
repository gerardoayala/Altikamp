<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
if(!empty($_POST))
{
  if(createMontanista($_POST['apellidoP'],$_POST['apellidoM'],$_POST['nombre'],$_POST['nickname'],$_POST['fechaNac'],$_POST['sexo'],$_POST['pais'],$_POST['estado'],$_POST['ciudad'],$_POST['calle'],$_POST['noExt'],$_POST['noInt'],$_POST['colonia'],$_POST['cp'],$_POST['telefono'],$_POST['celular'],$_POST['email'],$_POST['nombreMama'],$_POST['emailM'],$_POST['nombrePapa'],$_POST['emailP'],$_POST['diasAltikamp'],$_POST['nivelExpertiz'],$_POST['obMed'],$_POST['seguroGastosMed'],$_POST['observaciones'],$_POST['clave'],$_POST['contactoEmergencia'],$_POST['telefonoEmergencia'],$_POST['noFolio'],$_POST['colegio'])){
      header("Location: montanistas.php"); die();
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
        <label for="noFolio">Número de Folio</label>
        <input type="text" class="form-control" id="noFolio" name="noFolio" placeholder="noFolio" value="">
      </div>
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
        <label for="nickname">NickName</label>
        <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nick name" value="">
      </div>
      <div class="form-group">
        <label for="colegio">Escuela</label>
        <input type="text" class="form-control" id="colegio" name="colegio" placeholder="Escuela" value="">
      </div>
      <div class="form-group">
        <label for="nickname">Fecha de Nacimiento</label>
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
      <div class="form-group">
        <label for="diasAltikamp">Días en Altikamp</label>
        <input type="text" class="form-control" id="diasAltikamp" name="diasAltikamp" placeholder="Días en Altikamp" value="">
      </div>
      <div class="form-group">
        <label for="nivelExpertiz">Nivel de Expertiz</label>
        <input type="text" class="form-control" id="nivelExpertiz" name="nivelExpertiz" placeholder="Nivel de Expertiz" value="">
      </div>
      </div>
      <h3>Ubicación</h3>
      <div class="form-group">
        <label for="pais">País</label>
        <input type="text" class="form-control" id="pais" name="pais" placeholder="pais" value="">
      </div>
      <div class="form-group">
        <label for="estado">Estado</label>
        <input type="text" class="form-control" id="estado" name="estado" placeholder="estado" value="">
      </div>
      <div class="form-group">
        <label for="ciudad">Ciudad</label>
        <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="ciudad" value="">
      </div>
      <div class="form-group">
        <label for="colonia">Colonia</label>
        <input type="text" class="form-control" id="colonia" name="colonia" placeholder="colonia" value="">
      </div>
      <div class="form-group">
        <label for="calle">Calle</label>
        <input type="text" class="form-control" id="calle" name="calle" placeholder="calle" value="">
      </div>
      <div class="form-group">
        <label for="noExt">Número exterior</label>
        <input type="text" class="form-control" id="noExt" name="noExt" placeholder="Número exterior" value="">
      </div>
      <div class="form-group">
        <label for="noInt">Número interior</label>
        <input type="text" class="form-control" id="noInt" name="noInt" placeholder="Número interior" value="">
      </div>
      <div class="form-group">
        <label for="cp">Código Postal</label>
        <input type="text" class="form-control" id="cp" name="cp" placeholder="Código Postal" value="">
      </div>
    </div>
    <div class="col-md-6">
      <h3>Datos de Contacto</h3>
      <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" value="">
      </div>
      <div class="form-group">
        <label for="celular">Celular</label>
        <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular" value="">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="">
      </div>
      <div class="form-group">
        <label for="nombreMama">Nombre Madre</label>
        <input type="text" class="form-control" id="nombreMama" name="nombreMama" placeholder="Nombre Madre" value="">
      </div>
      <div class="form-group">
        <label for="emailM">Email Madre</label>
        <input type="text" class="form-control" id="emailM" name="emailM" placeholder="email" value="">
      </div>
      <div class="form-group">
        <label for="nombrePapa">Nombre Padre</label>
        <input type="text" class="form-control" id="nombrePapa" name="nombrePapa" placeholder="nombrePapa" value="">
      </div>
      <div class="form-group">
        <label for="emailP">Email Padre</label>
        <input type="text" class="form-control" id="emailP" name="emailP" placeholder="email" value="">
      </div>
      <div class="form-group">
        <label for="contactoEmergencia">Contacto de Emergencia</label>
        <input type="text" class="form-control" id="contactoEmergencia" name="contactoEmergencia" placeholder="Contacto de Emergencia" value="">
      </div>
      <div class="form-group">
        <label for="telefonoEmergencia">Teléfono de Emergencia</label>
        <input type="text" class="form-control" id="telefonoEmergencia" name="telefonoEmergencia" placeholder="Teléfono de Emergencia" value="">
      </div>
      <div class="form-group">
        <label for="obMed">Observaciones Médicas</label>
        <textarea class="form-control" id="obMed" name="obMed" placeholder="Descripción"></textarea>
      </div>
      <div class="form-group">
        <label for="seguroGastosMed">Seguro de Gastos Médicos</label>
        <textarea class="form-control" id="seguroGastosMed" name="seguroGastosMed" placeholder="Seguro de Gastos Médicos"></textarea>
      </div>
      <div class="form-group">
        <label for="observaciones">Observaciones</label>
        <textarea class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones Generales"></textarea>
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
</script>

 <script>
    var form = $('form');
      form.validate({
        rules: {
            'noFolio': {
                required: true,
                number:true,
                maxlength: '300'
            },
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
            'nickname': {
                required: true,
                maxlength: '20'
            },
            'colegio': {
                required: true,
                maxlength: '300'
            },
            'fechaNac': {
                required: true
            },
            'diasAltikamp': {
                required: true,
                digits:true,
                maxlength: '5'
            },
            'nivelExpertiz': {
                required: true,
                letters:true,
                maxlength: '50'
            },
            'pais': {
                required: true
            },
            'estado': {
                required: true
            },
            'ciudad': {
                letters:true,
                required: true,
                maxlength: '45'
            },
            'colonia': {
                maxlength: '80'
            },
            'calle': {
                maxlength: '75'
            },
            'noExt': {
                maxlength: '5'
            },
            'noInt': {
                maxlength: '5'
            },
            'cp': {
                digits:true,
                minlength: '5',
                maxlength: '5'
            },
            'telefono': {
                number:true,
                maxlength: '13'
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
            'nombreMama': {
                required: true,
                maxlength: '150'
            },
            'nombrePapa': {
                required: true,
                maxlength: '150'
            },
            'emailM': {
                email:true,
                required: true,
                maxlength: '50'
            },
            'emailP': {
                email:true,
                required: true,
                maxlength: '50'
            },
            'contactoEmergencia': {
                required: true,
                maxlength: '100'
            },
            'telefonoEmergencia': {
                required: true,
                maxlength: '13'
            },
            'obMed': {
                required: true,
                maxlength: '1000'
            },
            'seguroGastosMed': {
                required: true,
                maxlength: '45'
            },
            'observaciones': {
                required: true,
                maxlength: '1000'
            },
            'clave': {
                required: true,
                maxlength: '1000'
            },
          }
      });
  </script>
<?php
include_once 'models/footer.php';
?>