<a href="index.php">Home</a>
<?php	
	if(!logincheck()){
?>
    <form name="login_form" action="processlogin.php" method="post" id="login_form">                      
            Username: <input type="text" name="username" id="username" />
            Password: <input type="password" name="pass" id="pass"/> 
            		  <input type="hidden" name="token" value= <?php echo($_SESSION['token']);?> />
            <input type="submit" />
        </form>

<?php }else{  ?>
	
    <p>Logged in as: <?php echo $_SESSION['username']; ?></p>
    <Form Method ='POST' ACTION = 'includes/logout.php'>
    <INPUT type="hidden" name="token" value= <?php echo($_SESSION['token']); ?> />
	<INPUT TYPE = 'Submit' VALUE = 'logout'>
    </Form>
	
	<?php }?>	


<a href="regpage.php">Register</a>