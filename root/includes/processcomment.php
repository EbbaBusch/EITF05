<?php

if( $_POST)
{
	$con = mysql_connect("localhost", "root", "");
	 if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("webshop", $con);
 
  $users_comment = $_POST['comment'];
  if((strlen($users_comment) > 2)) {
  	
  
  $query = "
  INSERT INTO `webshop`.`comments` (`id`, `comment`) VALUES (NOW(),  '$users_comment');";
 mysql_query($query);



 //Some comment
 mysql_close($con);
header('Location: ../index.php');

	}
	}
mysql_close($con);
header('Location: ../index.php');
?>