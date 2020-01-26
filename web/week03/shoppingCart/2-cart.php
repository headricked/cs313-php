<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
</head>
<body>

<?php
    $_SESSION['cart'] = array(); // Declaring session array
    // array_push($_SESSION['cart'],'apple','mango','banana','orange'); // Items added to cart
    array_push($_SESSION['cart']); // Items added to cart

    echo    "Number of Items in the cart = " .
            sizeof($_SESSION['cart']);
    // " <a href=2-cart-remove-all.php>Remove all</a><br>";
    // " <a href=2-cart-remove.php>Remove</a>";
?>

<div><a href="2-cart-add.php">Add</a></div>
<div><a href="2-cart-display.php">Display</a></div>
<div><a href="2-cart-remove.php">Remove</a></div>


</body>
</html>