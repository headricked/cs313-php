<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Week 03 | Tell me about yourself</title>
</head>
<body>
    <form action="confirmation.php" method="post">

        <fieldset>
            <legend>Please provide shipping information</legend>
                <div>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="name">
                </div>
                <div>
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" placeholder="address">
                </div>
                <div>
                    <label for="name">City:</label>
                    <input type="text" id="city" name="city" placeholder="city">
                </div>
                <div>
                    <label for="name">State:</label>
                    <input type="text" id="state" name="state" placeholder="state">
                </div>
                <div>
                    <label for="name">ZIP:</label>
                    <input type="text" id="zip" name="zip" placeholder="zip">
                </div>
            <input type="submit" value="Submit"><input type="reset" value="Reset">
        </fieldset>        
    </form>

    <div><a href="2-cart-display.php">Return to Cart</a></div>

    
</body>
</html>