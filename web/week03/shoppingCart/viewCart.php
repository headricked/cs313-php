<?php
    // start session
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        // Echo session variables that were set on previous page
        echo "Your cart: " . $_SESSION['cart'] . ".<br>";
        var_dump($_SESSION['cart']);
    ?>    
</body>
</html>