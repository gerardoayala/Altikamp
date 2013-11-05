<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$userId = $_GET['id'];
if(!montanistaExists($userId)){
  header("Location: staff.php"); die();
}
deleteMontanista($userId);
header("Location: staff.php");
?>