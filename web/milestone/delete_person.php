<?php

    echo "delete_person.php";

    require "db_connect.php";
    $db = get_db();

    // Delete a row in the person table specified by id
    // $sql = 'DELETE FROM person WHERE person_id = :person_id';
    if ( isset($_POST['del']) ) {
        $id = $_POST['del'];
        $sql = 'DELETE FROM person WHERE person_id = $id';
        
        $stmt = $this->pdo->prepare($sql);
        // $stmt->bindValue(':id', $id);
        $stmt->execute();
    }



    // $sql = 'DELETE FROM person WHERE person_id = 10';

    // $stmt = $this->pdo->prepare($sql);
    // $stmt->bindValue(':person_id', $person_id);
    // $stmt->execute();

    $new_page = "index.php";

    header("Location: $new_page");
    
    die();

?>