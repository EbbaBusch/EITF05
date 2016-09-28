<?php 
include_once 'includes/database_connect.php'; 
include_once 'includes/functions.php';
secure_session();
?>
<head>
<meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php include ('menubar.php'); ?>
<div id="content">
    <div id="items">
<?php 
		
	$result = getitems();
	
	foreach($result as $item){
				$id = $item[0];
				$name = $item[1];
				$price = $item[2];
				$description = $item[3];
		?>
		
		<div class="item">
		
		<h1><?php echo($name);?></h1>
        <p>Price: <?php echo($price);?></p>
        <p>Description: <?php echo($description);?></p>
        
       <?php $comments = getcomments($id); 
	   			foreach($comments as $comment){
	   ?>
       <p>Comment: <?php echo($comment[0]);?></p>     
	   <?php } ?> 
       
       
       <form method="post" action="includes/addtocart.php">
       			<input type="hidden" name="id" value=<?php echo($id);?> />
                <input type="hidden" name="price" value=<?php echo($price);?> />
                <input type="hidden" name="product" value=<?php echo($name);?> />
                <input type='submit' value='ADD TO CART'/> 
       </form>
       
       <form method='post' action ='includes/processcomment.php'>
  			<textarea name='comment'></textarea>
   			<input type='hidden' name='id' value=<?php echo($id);?>></input>
            <input type="hidden" name="token" value=<?php echo($_SESSION['token'])?>></input>
  			<input type='submit' value='Comment'/>  
		 </form>
</div>
  <?php } ?>
  
  </div>
  <div class="shoppingcart"> 
  
    <h1>Shoppingcart</h1>  
  <?php
  
  if (isset($_SESSION['cart'])) {
  
  foreach($_SESSION['cart'] as $cartitem){ ?>
	<h2><?php print($cartitem[2]);?> </h1>
	<p> Quantity: <?php print($cartitem[1]);?> </p>
    <p> Price: <?php print($cartitem[3] * $cartitem[1]);?> </p>
    
      <form method='post' action='includes/deletefromcart.php'>
        <input type= 'hidden' name='id' value=<?php echo($cartitem[0]);?>></input>
        <input type='submit' value='Delete'/>  
        </form>


<?php  }  ?>
<form method="post" action="checkout.php">
<input type="hidden" name="token" value=<?php echo($_SESSION['token'])?>></input>
<input type="submit" value="Go to checkout">
</form>
<?php  } ?>

</div>

</div>

