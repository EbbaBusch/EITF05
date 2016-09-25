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
       				 header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
      				 exit();
   		}
			
   		$cookieParams = session_get_cookie_params();
    	session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
 
    session_start();            // Start the PHP session 
    session_regenerate_id(true); 
	}
	
	function login($loginname,$password){
		
		$sql = "Select loginname,pwd FROM users WHERE loginname=? LIMIT 1";
		$result = executeQuery($sql,array($loginname));
	
		if($result != null){
			
			foreach($result as $row){
				$dbpass = $row[1];
			
				if(password_verify($password,$dbpass)){
					 $_SESSION['username'] = $loginname;
					return true;
			}else{	
				return false;
			}
		}
	}else{
			return false;	
		}		
}

function logincheck(){
		if(isset($_SESSION['username'])){
			return true;
		}
	
}


?>