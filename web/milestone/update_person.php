<?php

    require "db_connect.php";
    $db = get_db();

    if (!isset($_GET['update'])) {
        die('Error: \'update\' not specified.');
    }
    $person_id = htmlspecialchars($_GET['update']);


    // update a row in the person table specified by id
    if ( isset($_GET['update']) ) {

        $id = htmlspecialchars($_GET['update']);

        $sql = "SELECT * FROM person";

        $res = $db->prepare($sql);
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $stmt->execute();
    }

    if ( isset($_POST[])) {

    }

    



    // $new_page = "details.php?person_id=$person_id";

    // header("Location: $new_page");
    
    die();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Person</title>
</head>
<body>
    <form action="." method="POST"></form>    
</body>
</html>