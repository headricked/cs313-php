<?php
    session_start();
?>

<!doctype html public "-//w3c//dtd html 3.2//en">
<html>

<head>
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

</body>
</html>