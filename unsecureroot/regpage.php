<?php include_once 'includes/functions.php'; 
 session_start();   
?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="UTF-8">
    </head>
    <body>
        <div id="reg">
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
     <?php if(!logincheck()){ ?>
		  <h1>Register</h1>
        <form id="registerform" method="post" action="register.php">
            <p>Username:</p><input id="username" type='text' name='username' id='username' /><br>
            <p>Email:</p><input id="email" type="text" name="email" id="email" /><br>
            <p>Password:</p><input id="password" type="password" name="pass" id="pass"/><br>
            
            <button type="button" onClick="register(this.form.username,this.form.email,this.form.pass)" value="Register">Register</button>
        </form>
        
	  <?php }else{print("You are already logged in");
	  
	  }?>
      
       <?php  if (isset($_REQUEST["err"])){
	  		
	  		$error = $_REQUEST["err"];
			print($error);
  }
  
  ?>
      
      <br><p id="error"></p>
      <br><p>Return to the <a href="index.php">login page</a>.</p>
       
     <script>
	
		function register(username,email,password){
					
			  if (username.value == '' || password.value == '' || email.value == ''){
					  $("#error").html("Please fill in all forms");
					return;  
				  }
				 
				  if (password.value.length < 6){
					  $("#error").html("Password must conatin at least 6 characthers");
					return;  
				  }  
		  
			$("#registerform").submit();
		  }
	 
</script>

<p id="responsetext"></p>
</div>
</body> 
</html>