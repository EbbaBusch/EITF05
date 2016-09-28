<?php 
include_once 'includes/functions.php';
secure_session();
?>
<head>
<meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<?php include ('menubar.php'); ?>
<div id="checkout">
<h1>Checkout</h1>
<h2>Your items</h2>
<?php
if($_POST['token'] == $_SESSION['token']){
$totalprice = 0;
foreach($_SESSION['cart'] as $cartitem){ ?>
	<h2><?php print($cartitem[2]);?> </h2>
	<p> Quantity: <?php print($cartitem[1]);?> </p>
    <p> Price: <?php print($cartitem[3] * $cartitem[1]);?> </p>
    
<?php
$totalprice = $totalprice + ($cartitem[3]*$cartitem[1]); 
}
echo "-----------------------------";
echo "<br/> Total price: $totalprice"; 
}
else {
    header('location: index.php');
}
?>

<form method="post" action="receipt.php">
    <input type="hidden" name="token" value=<?php echo($_SESSION['token'])?>></input>
    <input type="hidden" name="price" value="<?php echo $totalprice; ?>">
    <input type="text" name="firstname" placeholder="Firs name">
    <input type="text" name="lastname" placeholder="Last name">
    <input type="email" name="email" placeholder="Email">
    <input type="tel" name="phone" placeholder="Phone number">
    <input type="text" name="address" placeholder="Address">
    <input type="text" name="card" placeholder="Card number">
    <input type="submit" value="BUY!">
</form>
</div>