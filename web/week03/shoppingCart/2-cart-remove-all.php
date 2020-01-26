<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart Remove All</title>
</head>
<body>

<?php

    while (list ($key, $val) = each ($_SESSION['cart'])) { 
        //echo "$key -> $val <br>"; 
        unset($_SESSION['cart'][$key]);
    }

    echo "Number of Items in the cart = ".sizeof($_SESSION['cart'])." <br>";

?>

<div><a href=2-cart-add.php>Add</a></div>
<div><a href=2-cart-display.php>Display</a></div>
<div><a href=2-cart-remove.php>Remove</a></div>

</body>
</html>