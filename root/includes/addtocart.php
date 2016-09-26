<?php
include_once 'functions.php';
secure_session();

	$id = $_POST["id"];
	$price = $_POST["price"];
	$product = $_POST["product"];

	if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  
  if(!isset($_SESSION['cart'][$id])){
	  
	$_SESSION['cart'][$id] = array();
	
	$_SESSION['cart'][$id][] = $id;
	$_SESSION['cart'][$id][] = 1;
	$_SESSION['cart'][$id][] = $product ;
	$_SESSION['cart'][$id][] = $price ;
	
  }else{
	
	  $quantity = $_SESSION['cart'][$id][1];
	  $quantity  = $quantity + 1;
	  $_SESSION['cart'][$id][1] = $quantity;
	  
  } 

 	header('Location: ../index.php'); 
?>