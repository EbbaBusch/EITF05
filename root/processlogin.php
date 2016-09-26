<?php include_once 'includes/database_connect.php'; 
include_once 'includes/functions.php';
secure_session(); ?>

<?php

if (isset($_POST['username'], $_POST['pass'])){
		
		 $password = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
		 $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
		 
		if (login($username, $password) == true){
			header('Location: index.php'); 
		
		}else{
			header('Location: index.php');
			
	}
}

?>