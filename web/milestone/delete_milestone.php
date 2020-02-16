<?php

    $person_id = htmlspecialchars($_POST['person_id']);

    echo `person_id: $person_id`;

    require "db_connect.php";
    $db = get_db();

    // Delete a row in the milestone table specified by id
    if ( isset($_GET['delete']) ) {

        $id = htmlspecialchars($_GET['delete']);

        $sql_delete_milestone = 'DELETE FROM milestone WHERE milestone_id = :id;';
        
        $stmt = $db->prepare($sql_delete_milestone);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }


    // $new_page = "index.php";
    $new_page = "details.php?person_id=$person_id";


    header("Location: $new_page");
    
    die();

?>