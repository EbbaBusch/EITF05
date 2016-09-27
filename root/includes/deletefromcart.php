<?php
include_once 'database_connect.php'; 
include_once 'functions.php';
secure_session();

if($_POST)

{
	$id = $_POST["id"];
	
  if(isset($_SESSION['cart'][$id])){
	  
	unset($_SESSION['cart'][$id]);
	
  } 
  if(empty($_SESSION['cart'])){
      unset($_SESSION['cart']);
  }
  	header('Location: ../index.php'); 
	die();
}

?>