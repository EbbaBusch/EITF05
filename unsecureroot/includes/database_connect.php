<?php
	
	include_once'config.php';
	
try {
		$conn = new PDO(dsn, user, password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			$error = "Connection error: " . $e->getMessage();
			print $error . "<p>";
			unset($conn);
		
		}

?>
