<?php
    session_start();
    if (!isset($_SESSION["cart"]))
    {
        $_SESSION["cart"][] = array();
    }

    // if(!isset($_POST['cart'])){ 
    //     $_SESSION['cart'][] = $_POST['cart'];
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="cart.css">
    <title>Cart</title>
</head>
<body>

<!-- <form method="post" action="2-cart-display.php"> -->
<form method="post" action="">
    <table>
        <tr>
            <td>
                <img src="samsung.png" /><br/><br/>Samsung<br/>
            </td>
            <td>
                <img src="apple.png" /><br/><br/>Apple<br/>
            </td>
            <td>
                <img src="google.png" /><br/><br/>Google<br/>
            </td>
            <td>
                <img src="motorola.jpg" /><br/><br/>Motorola<br/>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" id="samsung" name="product" value="Samsung">Add to Cart</button>
            </td>
            <td>
                <button type="submit" id="apple" name="product" value="Apple">Add to Cart</button>
            </td>
            <td>
                <button type="submit" id="google" name="product" value="Google">Add to Cart</button>
            </td>
            <td>
                <button type="submit" id="motorola" name="product" value="Motorola">Add to Cart</button>           
            </td>
        </tr>
</form>


<?php
    $_SESSION['cart'][] = array(); // Declaring session array
    // array_push($_SESSION['cart'],'apple','mango','banana','orange'); // Items added to cart
    // array_push($_SESSION['cart']); // Items added to cart

    // echo    "Number of Items in the cart = " .
            // sizeof($_SESSION['cart']);
    // " <a href=2-cart-remove-all.php>Remove all</a><br>";
    // " <a href=2-cart-remove.php>Remove</a>";

    // get product value from button click, assign it to product variable
    @$product = $_POST['product'];


    if(strlen($product) != '') {
        array_push($_SESSION['cart'],$product); // Items added to cart
    }
        
    echo "<br>Number of Items in the cart: " . sizeof($_SESSION['cart']) . "<br/>";
    
    while (list($key, $val) = each ($_SESSION['cart'])) { 
        // echo "$key -> $val <br>"; 
        // echo "key: " . $key . " value: " . $val . "<br>"; 
        echo "Item: " . $val . "<br>"; 
    }

?>



<div><a href="2-cart-add.php">Add</a></div>
<div><a href="2-cart-display.php">View cart</a></div>
<div><a href="2-cart-remove.php">Remove</a></div>


</body>
</html>