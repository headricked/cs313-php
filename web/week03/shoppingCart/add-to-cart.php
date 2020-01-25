<?php
    // Start session
    session_start();

    // if (empty($_SESSION['cart'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    array_push($_SESSION['cart'], $_GET['id']);
    // array_push($_SESSION['cart'],$item);
?>

<p>Product was successfully added to your shopping cart.
    <a href="viewCart.php">View shopping cart</a>
</p>