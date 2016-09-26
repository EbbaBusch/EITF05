<?php 
include_once 'includes/database_connect.php'; 
include_once 'includes/functions.php';
secure_session();
?>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">

<?php	
	if(!logincheck()){
?>
    <form name="login_form" action="processlogin.php" method="post">                      
            Username: <input type="text" name="username" id="username" />
            Password: <input type="password" name="pass" id="pass"/> 
            <input type="submit" value="login" />
        </form>

<?php }else{ 
	print("<Form Method ='POST' ACTION = 'includes/logout.php'>
		<INPUT TYPE = 'Submit' VALUE = 'logout'>");
		}
?>

<a href="regpage.php">Register</a>

<?php 
		
	$result = getitems();
	
	foreach($result as $item){
				
		?>
		
		<div class="item">
		
		<h1 style="margin-left:2%; margin-top:2%;"><?php echo($item[1]);?></h1>
        <p>Price: <?php echo($item[2]);?></p>
        <p>Description: <?php echo($item[3]);?></p>
        
        <form method='POST' action="includes/addtocart.php">
        <input style="display:none;" name='id' value=<?php echo($item[0]);?>></input>
         <input style="display:none;" name='product' value=<?php echo($item[1]);?>></input>
          <input style="display:none;" name='price' value=<?php echo($item[2]);?>></input>
       <input type='submit' value='Submit'/>   
        </form>
        
       <?php $comments = getcomments($item[0]); 
	   			foreach($comments as $comment){
	   ?>
       <p>Comment: <?php echo($comment[0]);?></p>     
       
	   <?php } ?> 
       
       <form method='post' action = 'includes/processcomment.php'>
  <textarea name='comment'></textarea>
   <input style="display:none;" name='id' value=<?php echo($item[0]);?>></input>
  <input type='submit' value='Submit'/>  
</form>
</div>

  <?php } ?>
  <div class="shoppingcart"> 
  
    <h1>Shoppingcart</h1>  
  <?php
  
  if (isset($_SESSION['cart'])) {
  
  foreach($_SESSION['cart'] as $cartitem){ ?>
	<h2><?php print($cartitem[2]);?> </h1>
	<p> Quantity: <?php print($cartitem[1]);?> </p>
    <p> Price: <?php print($cartitem[3] * $cartitem[1]);?> </p>
    
      <form method='post' action='includes/deletefromcart.php'>
        <input style="display:none;" name='id' value=<?php echo($cartitem[0]);?>></input>
        <input type='submit' value='Delete'/>  
        </form>
<?php  }  
  }
?>
</div>



