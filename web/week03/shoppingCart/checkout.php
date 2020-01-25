<?php

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
    <form action="week03_team_results.php" method="post">

        <fieldset>
            <legend>Please provide shipping information</legend>
            <ul>
                <li>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="name">
                </li>
                <li>
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" placeholder="address">
                </li>
                <li>
                    <label for="name">City:</label>
                    <input type="text" id="city" name="city" placeholder="city">
                </li>
                <li>
                    <label for="name">State:</label>
                    <input type="text" id="state" name="state" placeholder="state">
                </li>
                <li>
                    <label for="name">ZIP:</label>
                    <input type="text" id="zip" name="zip" placeholder="zip">
                </li>
            </ul>
            <input type="submit" value="Submit"><input type="reset" value="Reset">
        </fieldset>        
    </form>
    
</body>
</html>