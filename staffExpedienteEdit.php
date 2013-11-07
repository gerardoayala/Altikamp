<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$staffid = $_GET['id'];
if(!empty($_POST))
{
  if(updateStaffExpediente($_POST['primeraEn'],$_POST['evaluador'],$_POST['aceptado'],$_POST['conclusiones'],$_POST['cartaPadres'],$_POST['cartaCompromiso'],$_POST['campSeleccion'],$_POST['pruebaFisica'],$_POST['cartaRecomendacion'],$_POST['reporteNeg'],$_POST['habilidadesUtiles'],$staffid)){
      header("Location: staffExpediente.php?id=$staffid"); die();
  }else{
    $errors[] = "Error al crear";
  }
} 
$staff = fetchStaffExpedienteIndi($staffid);
require_once("models/header.php");
include("nav.php");
echo resultBlock($errors,$successes);
if($staff[0]['aceptado']==1){
    $aceptado = "<option value='1'>Si</option>";
  }else{
    $aceptado = "<option value='0'>No</option>";
  }
  if($staff[0]['cartaCompromiso']==1){
    $cartaC = "<option value='1'>Si</option>";
  }else{
    $cartaC = "<option value='0'>No</option>";
  }
  if($staff[0]['cartaRecomendacion']==1){
    $cartaR = "<option value='1'>Si</option>";
  }else{
    $cartaR = "<option value='0'>No</option>";
  }
  if($staff[0]['cartaPadres']==1){
    $cartaP = "<option value='1'>Si</option>";
  }else{
    $cartaP = "<option value='0'>No</option>";
  }
  if($staff[0]['campSeleccion']==1){
    $campS = "<option value='1'>Si</option>";
  }else{
    $campS = "<option value='0'>No</option>";
  }
?>
<div class="container">
  <div class="row">
    <?php echo "<form name='montanista' action='".$_SERVER['PHP_SELF']."?id=".$staffid."' method='post'>";?>
    <div class="col-md-6">
      <h3>Cartas</h3>
      <div class="form-group">
        <label for="aceptado">Aceptado</label>
        <select name="aceptado" class="form-control" >
          <?php echo $aceptado;?>
          <option value="">Selecciona una opción</option>
          <option value="1">Si</option>
          <option value="0">No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="cartaPadres">Carta Padres</label>
        <select name="cartaPadres" class="form-control" >
          <?php echo $cartaP;?>
          <option value="">Selecciona una opción</option>
          <option value="1">Si</option>
          <option value="0">No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="cartaCompromiso">Carta Compromiso</label>
        <select name="cartaCompromiso" class="form-control" >
          <?php echo $cartaC;?>
          <option value="">Selecciona una opción</option>
          <option value="1">Si</option>
          <option value="0">No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="cartaRecomendacion">Carta Recomendación</label>
        <select name="cartaRecomendacion" class="form-control" >
          <?php echo $cartaR;?>
          <option value="">Selecciona una opción</option>
          <option value="1">Si</option>
          <option value="0">No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="campSeleccion">Campamento Selección</label>
        <select name="campSeleccion" class="form-control" >
          <?php echo $campS;?>
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
        <input type="text" class="form-control datepicker" id="primeraEn" name="primeraEn" placeholder="Fecha" value="<?php echo $staff[0]['primeraEn']?>">
      </div>
      <div class="form-group">
        <label for="evaluador">Evaluador</label>
        <input type="text" class="form-control" id="evaluador" name="evaluador" placeholder="Evaluador" value="<?php echo $staff[0]['evaluador']?>">
      </div>
      <div class="form-group">
        <label for="pruebaFisica">Prueba Física</label>
        <input class="form-control" id="pruebaFisica" name="pruebaFisica" placeholder="Prueba Física" value="<?php echo $staff[0]['pruebaFisica']?>">
      </div>
      <div class="form-group">
        <label for="conclusiones">Conclusiones</label>
        <textarea class="form-control" id="conclusiones" name="conclusiones" placeholder="Conclusiones"><?php echo $staff[0]['primeraEn']?></textarea>
      </div>
      <div class="form-group">
        <label for="conclusiones">Reporte Neg</label>
        <textarea class="form-control" id="reporteNeg" name="reporteNeg" placeholder="Reporte Neg"><?php echo $staff[0]['reporteNeg']?></textarea>
      </div>
      <div class="form-group">
        <label for="conclusiones">Habilidades Útiles</label>
        <textarea class="form-control" id="habilidadesUtiles" name="habilidadesUtiles" placeholder="Habilidades Útiles"><?php echo $staff[0]['habilidadesUtiles']?></textarea>
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
            'aceptado': {
                required: true
            },
            'cartaPadres': {
                required: true
            },
            'cartaCompromiso': {
                required: true
            },
            'cartaRecomendacion': {
                required: true
            },
            'campSeleccion': {
                required: true
            },
            'primeraEn': {
                required: true
            },
            'evaluador': {
                required: true,
                maxlength: '8'
            },
            'pruebaFisica': {
                required: true,
                maxlength: '8'
            },
            'conclusiones': {
                required: true
            },
            'reporteNeg': {
                required: true
            },
            'habilidadesUtiles': {
                required: true
            }
         }
      });
  </script>
<?php
include_once 'models/footer.php';
?>