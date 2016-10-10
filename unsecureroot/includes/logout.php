<?php
include_once 'functions.php';
secure_session();

if(isset($_POST['token'])){
 
 if($_POST['token'] == $_SESSION['token']){
 
// Unset all session values 
$_SESSION = array();
 
// get session parameters 
$params = session_get_cookie_params();
 
// Delete the actual cookie. 
setcookie(session_name(),
        '', time() - 42000, 
        $params["path"], 
        $params["domain"], 
        $params["secure"], 
        $params["httponly"]);
 
// Destroy session 
session_destroy();
header('Location: ../index.php');
}
die();
}
die();
?>
