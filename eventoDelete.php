<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$userId = $_GET['id'];
if(!eventoExists($userId)){
  header("Location: eventos.php"); die();
}
deleteEvento($userId);
header("Location: eventos.php");
?>