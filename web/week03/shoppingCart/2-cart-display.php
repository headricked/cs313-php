<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart Display</title>
</head>
<body>

<?php
    /// assign the value of the 'product' input to php variable
    @$product=$_POST['product'];
    if(strlen($product) != '') {
        array_push($_SESSION['cart'],$product); // Items added to cart
    }

    // echo "Number of Items in the cart = ".sizeof($_SESSION['cart'])." <a href=2-cart-remove-all.php>Remove all</a><br>";
    echo "Number of Items in the cart: " . sizeof($_SESSION['cart']) . "<br/>";

    while (list($key, $val) = each ($_SESSION['cart'])) { 
        // echo "$key -> $val <br>"; 
        echo "Item: " . $val . "<br>"; 
    }
?>

<div><a href="2-cart-add.php">Add</a></div>
<div><a href="2-cart-display.php">Display</a></div>
<div><a href="2-cart-remove.php">Remove</a></div>

</body>
</html>