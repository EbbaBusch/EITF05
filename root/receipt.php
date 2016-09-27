<?php
include ('includes/functions.php');
secure_session();
?>

<head>
<meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<?php include ('menubar.php'); ?>

<?php
if($_POST['token'] == $_SESSION['token']){
$totalprice = 0;
foreach($_SESSION['cart'] as $cartitem){ ?>
	<h2><?php print($cartitem[2]);?> </h2>
	<p> Quantity: <?php print($cartitem[1]);?> </p>
    <p> Price: <?php print($cartitem[3] * $cartitem[1]);?> </p>
    
<?php } 

    unset($_SESSION['cart']);

}
    echo $_POST['price'];
    echo $_POST['firstname'];
    echo $_POST['lastname'];
    echo $_POST['email'];
    echo $_POST['address'];
    echo $_POST['phone'];
?>