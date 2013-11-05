<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$userId = $_GET['id'];
if(!staffExpedienteExists($userId)){
  header("Location: staffExpediente.php?id=$userId"); die();
}
deleteStaffExpediente($userId);
header("Location: staffExpediente.php?id=$userId");
?>