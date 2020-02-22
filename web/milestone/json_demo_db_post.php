<?php
    // Convert the request into an object, using the PHP function json_decode().
    // Access the database, and fill an array with the requested data.
    // Add the array to an object, and return the object as JSON using the json_encode() function.

    require "db_connect.php";
    $db = get_db();

    header("Content-Type: application/json; charset=UTF-8");
    $obj = json_decode($_POST["x"], false);


    // $db = new mysqli("myServer", "myUser", "myPassword", "Northwind");
    // $stmt = $conn->prepare("SELECT name FROM ? LIMIT ?");

    $stmt = $db->prepare("SELECT milestone_id, milestone_name, milestone_date, milestone_location, milestone_notes, person_id
                            FROM milestone
                            WHERE person_id = 3 AND milestone_id = 43
                            LIMIT 1;");

    $stmt->bind_param("ss", $obj->table, $obj->limit);
    $stmt->execute();
    $result = $stmt->get_result();
    $outp = $result->fetch(PDO::FETCH_ASSOC);

    echo json_encode($outp);
?>