<?php 
include_once 'includes/database_connect.php'; 
include_once 'includes/functions.php';

// secure_session();
 session_start();    
?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<?php
	
	if(!logincheck()){
?>
    <form name="login_form" action="processlogin.php" method="post">                      
            Username: <input type="text" name="username" id="username" />
            Password: <input type="password" name="pass" id="pass"/> 
        </form>
        <button id="login" >Login</button>

<?php }else{ 
	print("<Form Method ='POST' ACTION = 'includes/logout.php'>
		<INPUT TYPE = 'Submit' VALUE = 'logout'>");
		}
?>

 <script>
	
		 $("#login").click(function(){	
		 
		var  username=$("#username").val();
		 var password=$("#pass").val();
		 
		  $.ajax({
		   type: "POST",
		   url: "processlogin.php",
			data: "username="+username+"&pass="+password,
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

<a href="regpage.php">Register</a>

<p id="responsetext"></p>

<form method='post' action = 'includes/processcomment.php'>

  Comment:<br />
  <textarea name='comment' id='comment'></textarea><br />
  
  <input type='submit' value='Submit'/>  
</form>


<?php include 'includes/collectcomments.php'; ?>
