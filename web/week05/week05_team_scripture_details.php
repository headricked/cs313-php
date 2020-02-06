<?php

    if (!isset($_GET['scripture_id'])) {
        die('Error: scripture id not specified.');
    }
    
    $scripture_id = htmlspecialchars($_GET['scripture_id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scripture Details</title>
</head>
<body>
    <h1>Scripture Details for scripture ID: <?php echo $scripture_id ?></h1>

    <?php



    ?>

</body>
</html>