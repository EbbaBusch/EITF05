<?php
    include ('includes/functions.php');
    secure_session();
?>

<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php
    include ('menubar.php');
?>

<div id="receipt">
    <h2>Thank you for your purchase!</h2>
    <h3>This is your reciept</h3>
    <div id="products">
        <h4>Product(s):</h4>
        <?php
            if($_POST['token'] == $_SESSION['token']){
            $totalprice = 0;
            foreach($_SESSION['cart'] as $cartitem){
        ?>
        <h5><?php print($cartitem[2]);?> </h5>
        <p> Quantity: <?php print($cartitem[1]);?> </p>
        <p> Price: <?php print($cartitem[3] * $cartitem[1]);?> </p>    
        <?php 
            }
                unset($_SESSION['cart']);
            }
        ?>  
    </div>    
    <div id="details">
        <h4>Your details:</h4>
        <p><h5>Amount payed:</h5> <?php echo $_POST['price']; ?></p>
        <p><h5>First name:</h5> <?php echo $_POST['firstname']; ?></p>
        <p><h5>Last name:</h5> <?php echo $_POST['lastname']; ?></p>
        <p><h5>E-mail:</h5> <?php echo $_POST['email']; ?></p>
        <p><h5>Shipping address:</h5> <?php echo $_POST['address']; ?></p>
        <p><h5>Phone number:</h5> <?php echo $_POST['phone']; ?></p>
    </div>
</div>