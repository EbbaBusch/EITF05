<?php

	 function executeQuery($query, $param = null) {
		global $conn;
		try {
			$stmt = $conn->prepare($query);
			$stmt->execute($param);
			$result = $stmt->fetchAll();
		} catch (PDOException $e) {
			$error = "*** Internal error: " . $e->getMessage() . "<p>" . $query;
			die($error);
		}
		return $result;
	}
	
	function executeUpdate($query, $param = null) {
		global $conn;
		try {
			$stmt = $conn->prepare($query);
			$stmt->execute($param);
		} catch (PDOException $e) {
			$error = "*** Internal error: " . $e->getMessage() . "<p>" . $query;
			die($error);
		}
	}
	
	function selectall(){
		$sql = "Select * from Users";
		$result = executeQuery($sql);
		return $result;
	}
	
	function secure_session(){
			
		$secure = false;
		$httponly = true;
			 
		if (ini_set('session.use_only_cookies', 1) === FALSE) {
       				 header("Location: ../index.php");
      				 exit();
   		}
			
   		$cookieParams = session_get_cookie_params();
    	session_set_cookie_params(900,
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
 
    session_start();            // Start the PHP session 
    session_regenerate_id(true); 

	if(!isset($_SESSION['token'])){
		$token = base64_encode(openssl_random_pseudo_bytes(16));
		$_SESSION['token'] = $token;
	}
}
	
	function login($loginname,$password){
		
		global $conn;
		
		if(!bruteforce($loginname)){
		
		$sql = "Select loginname,pwd FROM users WHERE loginname='$loginname'";
		$result = $conn->query($sql);
	
		if($result != null){
			
			foreach($result as $row){
				$dbpass = $row[1];
			
				if(password_verify($password,$dbpass)){
					 $_SESSION['username'] = $loginname;
					return true;
			}else{	
			
			}
		}
	}else{
			
		}	

		$sql2 = "INSERT INTO loginattempts(loginname,loginattempt) values(?,?)";
		$time = time();
		$result = executeUpdate($sql2,array($loginname,$time));
		return false;	
		
		}
		header("../index.php");
}



function bruteforce($loginname){
	 $now = time();
	 $attempts = $now - (60 * 60);
	 
	 $sql = "SELECT loginattempt from loginattempts  WHERE loginname = ? and loginattempt > ?";
	 
	 $result = executeQuery($sql,array($loginname,$attempts));
	 
	 if (count($result) > 5) {
            return true;
        } else {
            return false;
        }
}

function logincheck(){
		if(isset($_SESSION['username'])){
			return true;
		}
}

function getitems(){
	
	$sql = "Select * from items";
	$result = executeQuery($sql);
	
	return $result;
}

function getcomments($id){
	$sql = "Select comments from comments where id =?";
	$result = executeQuery($sql,array($id));
	return $result;
}



?>
