<?php

    require "db_connect.php";
    $db = get_db();

    // Delete a row in the person table specified by id
    if ( isset($_GET['delete']) ) {

        $id = htmlspecialchars($_GET['delete']);

        $sql_delete_person = 'DELETE FROM person WHERE person_id = :id;';
        
        $stmt = $db->prepare($sql_delete_person);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }


    $new_page = "index.php";

    header("Location: $new_page");
    
    die();

?>