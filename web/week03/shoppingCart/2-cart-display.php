<?php
    session_start();
?>

<!doctype html public "-//w3c//dtd html 3.2//en">
<html>

<head>
    <title>Cart Display</title>
</head>

<body>

<?php
    // echo "Number of Items in the cart = ".sizeof($_SESSION['cart'])." <a href=2-cart-remove-all.php>Remove all</a><br>";
    echo "Number of Items in the cart = " . sizeof($_SESSION['cart']);

    while (list ($key, $val) = each ($_SESSION['cart'])) { 
        echo "$key -> $val <br>"; 
    }
?>

<div><a href=2-cart-add.php>Add</a></div>
<div><a href=2-cart-display.php>Display</a></div>
<div><a href=2-cart-remove.php>Remove</a></div>

</body>
</html>