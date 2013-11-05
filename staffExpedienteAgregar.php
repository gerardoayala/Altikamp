<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$staffid = $_GET['id'];
if(!empty($_POST))
{
  if(createStaffExpediente($_POST['primeraEn'],$_POST['evaluador'],$_POST['aceptado'],$_POST['conclusiones'],$_POST['cartaPadres'],$_POST['cartaCompromiso'],$_POST['campSeleccion'],$_POST['pruebaFisica'],$_POST['cartaRecomendacion'],$_POST['reporteNeg'],$_POST['habilidadesUtiles'],$staffid)){
      header("Location: staffExpediente.php?id=$staffid"); die();
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
    <?php echo "<form name='montanista' action='".$_SERVER['PHP_SELF']."?id=".$staffid."' method='post'>";?>
    <div class="col-md-6">
      <h3>Cartas</h3>
      <div class="form-group">
        <label for="aceptado">Aceptado</label>
        <select name="aceptado" class="form-control" >
          <option value="">Selecciona una opción</option>
          <option value="1">Si</option>
          <option value="0">No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="cartaPadres">Carta Padres</label>
        <select name="cartaPadres" class="form-control" >
          <option value="">Selecciona una opción</option>
          <option value="1">Si</option>
          <option value="0">No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="cartaCompromiso">Carta Compromiso</label>
        <select name="cartaCompromiso" class="form-control" >
          <option value="">Selecciona una opción</option>
          <option value="1">Si</option>
          <option value="0">No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="cartaSeleccion">Carta Selección</label>
        <select name="cartaSeleccion" class="form-control" >
          <option value="">Selecciona una opción</option>
          <option value="1">Si</option>
          <option value="0">No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="cartaRecomendacion">Carta Recomendación</label>
        <select name="cartaRecomendacion" class="form-control" >
          <option value="">Selecciona una opción</option>
          <option value="1">Si</option>
          <option value="0">No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="campSeleccion">Campamento Selección</label>
        <select name="campSeleccion" class="form-control" >
          <option value="">Selecciona una opción</option>
          <option value="1">Si</option>
          <option value="0">No</option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <h3>Datos Generales</h3>
      <div class="form-group">
        <label for="primeraEn">Primera Entrevista</label>
        <input type="text" class="form-control datepicker" id="primeraEn" name="primeraEn" placeholder="Fecha" value="">
      </div>
      <div class="form-group">
        <label for="evaluador">Evaluador</label>
        <input type="text" class="form-control" id="evaluador" name="evaluador" placeholder="Evaluador" value="">
      </div>
      <div class="form-group">
        <label for="pruebaFisica">Prueba Física</label>
        <input class="form-control" id="pruebaFisica" name="pruebaFisica" placeholder="Prueba Física" value="">
      </div>
      <div class="form-group">
        <label for="conclusiones">Conclusiones</label>
        <textarea class="form-control" id="conclusiones" name="conclusiones" placeholder="Conclusiones"></textarea>
      </div>
      <div class="form-group">
        <label for="conclusiones">Reporte Neg</label>
        <textarea class="form-control" id="reporteNeg" name="reporteNeg" placeholder="Reporte Neg"></textarea>
      </div>
      <div class="form-group">
        <label for="conclusiones">Habilidades Útiles</label>
        <textarea class="form-control" id="habilidadesUtiles" name="habilidadesUtiles" placeholder="Habilidades Útiles"></textarea>
      </div>
    <button type="submit" class="btn btn-default">Guardar</button>
    </div>
    </form>
  </div>
</div>
<script>
$("#primeraEn").datepicker({
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