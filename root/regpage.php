<?php include_once 'includes/database_connect.php'; ?>
<?php include_once 'includes/functions.php'; ?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1>Register</h1>
        
        <form>
            Username: <input type='text' name='username' id='username' /><br>
            Email: <input type="text" name="email" id="email" /><br>
            Password: <input type="password" name="pass" id="pass"/><br>
        </form>
         <button id="register" >Register</button>
        
        <br><p>Return to the <a href="index.php">login page</a>.</p>
        
    </body>
     <script>
	
		 $("#register").click(function(){	
		 
		var  username=$("#username").val();
		 var password=$("#pass").val();
		  var email=$("#email").val();
		   
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
	 });
</script>

<p id="responsetext"></p>
    
    
</html>