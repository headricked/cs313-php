<?php
    // Start session
    session_start();

    if (isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    array_push($_SESSION['cart'],$item);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smartphones</title>
</head>
<body>

    <section>
        <table>
            <tr>
                <td>
                    Samsung Galaxy
                </td>
                <td>
                    Apple iPhone
                </td>
                <td>
                    Google Pixel
                </td>
                <td>
                    Motorola G7
                </td>
            </tr>
            <tr>
                <td>
                    <a href="">Add to Cart</a>
                </td>
                <td>
                    <a href="">Add to Cart</a>
                </td>
                <td>
                    <a href="">Add to Cart</a>
                </td>
                <td>
                    <a href="">Add to Cart</a>
                </td>
            </tr>
        </table>

        <?php
            // Set session variables
            $_SESSION["favcolor"] = "green";
            $_SESSION["favanimal"] = "cat";
            echo "Session variables are set.";
        ?>

        <div><a href="viewCart.php">View Cart</a></div>

    </section>
    
</body>
</html>