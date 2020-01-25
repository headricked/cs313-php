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
    echo "Number of Items in the cart = ".sizeof($_SESSION['cart'])." <a href=cart-remove-all.php>Remove all</a><br>";

    while (list ($key, $val) = each ($_SESSION['cart'])) { 
        echo "$key -> $val <br>"; 
    }
?>

</body>
</html>