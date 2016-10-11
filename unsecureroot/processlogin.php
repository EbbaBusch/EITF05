<?php include_once 'includes/database_connect.php'; 
include_once 'includes/functions.php';
secure_session();


if (isset($_POST['username'], $_POST['pass'], $_POST['token'] )){
		if($_POST['token'] == $_SESSION['token']){
		
		 $password = $_POST['pass'];
		 $username = $_POST['username'];
		 
		if (login($username, $password) == true){
			header('Location: index.php'); 
		
		}else{
			header('Location: index.php');
	}
}
header('Location: index.php');
}

?>