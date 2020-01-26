<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart Add</title>
</head>
<body>

<!-- <form method="post" action="2-cart-display.php">
    Enter a product name <input type="text" name="product">
    <input type="submit" value="Add to Cart">
</form> -->

<button id="samsung">Add to Cart</button>
<button id="apple">Add to Cart</button>
<button id="google">Add to Cart</button>
<button id="motorola">Add to Cart</button>



<?php
    @$product = $_POST['product'];
    if(strlen($product) != '') {
            array_push($_SESSION['cart'],$product); // Items added to cart
    }
        
    echo "<br>Number of Items in the cart = " . sizeof($_SESSION['cart']) . "<br/>";
    
    while (list ($key, $val) = each ($_SESSION['cart'])) { 
        // echo "$key -> $val <br>"; 
        echo "key: " . $key . " value: " . $val . "<br>"; 
    }
?>

<div><a href="2-cart-add.php">Add</a></div>
<div><a href="2-cart-display.php">Display</a></div>
<div><a href="2-cart-remove.php">Remove</a></div>

<script src="script.js"></script>

</body>
</html>