<?php
    session_start();
?>

<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
    <title>Cart</title>
</head>
<body>

<?php
    $_SESSION['cart']=array(); // Declaring session array
    array_push($_SESSION['cart'],'apple','mango','banana'); // Items added to cart

    echo "Number of Items in the cart = ".sizeof($_SESSION['cart'])." <a href=2-cart-remove-all.php>Remove all</a><br>";
?>

</body>
</html>