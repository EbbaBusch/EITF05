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
        <form>
            Username: <input type='text' name='username' id='username' /><br>
            Email: <input type="text" name="email" id="email" /><br>
            Password: <input type="password" name="pass" id="pass"/><br>
            <button type="button" onClick="register()" value="Register">Register</button>
        </form>
        
	  <?php }else{print("You are already logged in");
	  
	  }?>
      
      <br><p>Return to the <a href="index.php">login page</a>.</p>
        
    
     <script>
	
		function register(){
		 
			var username= $("#username").val();
			var password= $("#pass").val();
		 	var email= $("#email").val();
		  
		  if(username =="" || password == "" || email==""){
			  var response = "Please fill in all details";
			  $("#responsetext").html(response);
			  return;
		  }
		  
		  if(password.length < 6){
			  var response = "Please enter a password with over 6 characters";
			  $("#responsetext").html(response);
			  return;
		  }
		  
		  $.ajax({
		   type: "POST",
		   url: "register.php",
			data: "username="+username+"&pass="+password+"&email="+email,
		   success: function(html){    
			if(html == 1){
				window.location.replace("index.php");
			}
			else{
				$("#responsetext").html(html);
			}
		   },
		  }); 
		  }
	 
</script>

<p id="responsetext"></p>
</div>
</body> 
</html>