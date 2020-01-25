<?php
    // Start session
    session_start();

    if (empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    array_push($_SESSION['cart'], $_GET['id']);

?>

<p>Product was successfully added to your shopping cart.
    <a href="viewCart.php">View shopping cart</a>
</p>