<div id="menu">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="regpage.php">Register</a></li>
        <li id="login">
<?php	
	if(!logincheck()){
?>
    <form name="login_form" action="processlogin.php" method="post" id="login_form">                      
            <input type="text" name="username" id="username" placeholder="Username"/>
            <input type="password" name="pass" id="pass" placeholder="Password"/> 
            <input type="hidden" name="token" value= <?php echo($_SESSION['token']);?> />
            <button type="submit" value="Log in">Log in</button>
        </form>

<?php }else{  ?>
	
    <p>Logged in as: <?php echo $_SESSION['username']; ?></p>
    <Form Method ='POST' ACTION = 'includes/logout.php'>
    <INPUT type="hidden" name="token" value= <?php echo($_SESSION['token']); ?> />
        <button TYPE = 'Submit' VALUE = 'logout'>Log out</button>
    </Form>
	
	<?php } ?>	
        </li>
    </ul>
</div>