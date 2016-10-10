<?php include_once 'includes/database_connect.php'; ?>
<?php include_once 'includes/functions.php'; ?>

<?php

	if (isset($_POST['username'], $_POST['email'], $_POST['pass'])){
		
		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		$pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
		
		$sql = "SELECT loginname FROM users WHERE loginname=? LIMIT 1";
		$result= executeQuery($sql,array($username));
		
		if($result != null){
			header('Location: regpage.php');
			return;
			die();
		}
		
		$password = password_hash($pass, PASSWORD_BCRYPT);
		$sql2 = "INSERT INTO users (loginname,pwd,mail) VALUES(?,?,?)";
		
		executeUpdate($sql2,array($username,$password,$email));	
	
		header('Location: index.php');
				
	}
	header('Location: regpage.php');
?>
