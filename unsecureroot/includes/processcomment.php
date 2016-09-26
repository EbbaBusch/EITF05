<?php
include_once 'database_connect.php'; 
include_once 'functions.php';

if($_POST)

{
	$comment = $_POST["comment"];
	$id = $_POST["id"];
	
	$sql = "Insert into comments (id,comments) values(?,?)";
	executeUpdate($sql,array($id,$comment));
	header('Location: ../index.php'); 

	}
	
header('Location: ../index.php');
?>