<?php
session_start();
if($_SESSION['access'] < 9) die("<h1><font color=\"red\">Access Denied: You are not Admin!</font></h1>");

include_once(__DIR__."/../../config.php");
require_once(__DIR__."/../../Database.php");
global $database;



$id = $_POST['id'];



$database->query("UPDATE users SET
	ap = '".$_POST['off']."',
	dp = '".$_POST['def']."',
	RR = '".$_POST['res']."'
	WHERE id = $id");

header("Location: ../../../2388076972/admin.php?p=player&uid=".$id."");
?>