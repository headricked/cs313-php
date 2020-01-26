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

<form method=post action=''>
    Enter a product name <input type=text name=product>
    <input type=submit value='Add to Cart'>
</form>

<?php
    @$product=$_POST['product'];
    // if(strlen($product)>3){
    if(strlen($product) != '') {
            array_push($_SESSION['cart'],$product); // Items added to cart
    }
    
    echo "<br>Number of Items in the cart = " . sizeof($_SESSION['cart']) . "<br/>";
?>

<div><a href=2-cart-add.php>Add</a></div>
<div><a href=2-cart-display.php>Display</a></div>
<div><a href=2-cart-remove.php>Remove</a></div>

</body>
</html>