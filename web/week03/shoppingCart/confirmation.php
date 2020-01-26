<?php
    session_start();

    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $city = htmlspecialchars($_POST['city']);
    $state = htmlspecialchars($_POST['state']);
    $zip = $_POST['zip'];
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

    <fieldset>
        <legend>Thank you for your purchase.</legend>
            <div>
                Name: <?php echo $name; ?>
            </div>
            
            <div>
                Address: <?php echo $address; ?>
                
            </div>
            
            <div>
                City: <?php echo $city; ?>
            </div>
            
            <div>
                State: <?php echo $state; ?>
            </div>
            
            <div>
                ZIP: <?php echo $zip; ?>
            </div>

            <?php
                @$product = $_POST['product'];
                if(strlen($product) != '') {
                    array_push($_SESSION['cart'],$product); // Items added to cart
                }
                    
                echo "<br>Items purchased: " . sizeof($_SESSION['cart']) . "<br/>";
                
                while (list($key, $val) = each ($_SESSION['cart'])) { 
                    echo "Item: " . $val . "<br>"; 
                }
            ?>



    </fieldset>

</body>
</html>