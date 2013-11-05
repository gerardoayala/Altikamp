<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$userId = $_GET['id'];
if(!montanistaExists($userId)){
  header("Location: montanistas.php"); die();
}
deleteMontanista($userId);
header("Location: montanistas.php");
?>