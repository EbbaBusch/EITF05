<?php
include_once 'database_connect.php'; 
include_once 'functions.php';
secure_session();

if($_POST['token'] == $_SESSION['token']){
	if(isset($_POST['id'])){

		$comment =  filter_input(INPUT_POST,'comment', FILTER_SANITIZE_STRING);
		$id = filter_input(INPUT_POST,'id', FILTER_SANITIZE_STRING);
		
		$sql = "Insert into comments (id,comments) values(?,?)";
		executeUpdate($sql,array($id,$comment));
		header('Location: ../index.php'); 

	}
}
	header('Location: ../index.php');
?>