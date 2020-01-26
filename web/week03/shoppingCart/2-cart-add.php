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

<form method="post" action="2-cart-display.php">
    Enter a product name <input type="text" name="samsung">
    <input type="submit" value="Add to Cart">
</form>

<form method="post" action="2-cart-display.php">
    Enter a product name <input type="text" name="apple">
    <input type="submit" value="Add to Cart">
</form>

<form method="post" action="2-cart-display.php">
    Enter a product name <input type="text" name="google">
    <input type="submit" value="Add to Cart">
</form>

<form method="post" action="2-cart-display.php">
    Enter a product name <input type="text" name="motorola">
    <input type="submit" value="Add to Cart">
</form>



<?php
    // @$product = $_POST['product'];
    // if(strlen($product) != '') {
    //         array_push($_SESSION['cart'],$product); // Items added to cart
    // }
    
    @$samsung = $_POST['samsung'];
    if(strlen($samsung) != '') {
            array_push($_SESSION['cart'],$samsung); // Items added to cart
    }
    
    @$apple = $_POST['apple'];
    if(strlen($apple) != '') {
            array_push($_SESSION['cart'],$apple); // Items added to cart
    }
    
    @$google = $_POST['google'];
    if(strlen($google) != '') {
            array_push($_SESSION['cart'],$google); // Items added to cart
    }
    
    @$motorola = $_POST['motorola'];
    if(strlen($motorola) != '') {
            array_push($_SESSION['cart'],$motorola); // Items added to cart
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

</body>
</html>