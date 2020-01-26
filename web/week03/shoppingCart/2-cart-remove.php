<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart Remove</title>
</head>
<body>

<?php
    $item=$_POST['item'];
    while (list ($key1,$val1) = @each ($item)) {
        //echo "$key1 , $val1,<br>";
        unset($_SESSION['cart'][$val1]);
    }

    echo "Number of Items in the cart = ".sizeof($_SESSION['cart'])." <br>";
    echo "<form method=post action=''>";

    while (list ($key, $val) = each ($_SESSION['cart'])) { 
        echo " <input type=checkbox name=item[] value='$key'>  $key -> $val <br>"; 
    }

    echo "<input type=submit value=Remove></form>";
?>

<div><a href="2-cart-add.php">Add</a></div>
<div><a href="2-cart-display.php">Display</a></div>
<div><a href="2-cart-remove.php">Remove</a></div>

</body>
</html>