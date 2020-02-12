<?php

    // if (!isset($_GET['person_id'])) {
    //     die('Error: person_id not specified.');
    // }
    // $person_id = htmlspecialchars($_GET['person_id']);

    // get the 
    $person_id = htmlspecialchars($_POST['p_person_id']);

    $button_name = 'delete_person_' . $person_id;

    require "db_connect.php";
    $db = get_db();

    if(isset($_POST[$button_name])) { 
        echo "This is Button $person_id that is selected"; 
    } 
    if(isset($_POST['button2'])) { 
        echo "This is Button2 that is selected"; 
    }
    
    // Delete a row in the person table specified by id
    function delete($id) {
        // $sql = 'DELETE FROM person WHERE person_id = :person_id';
        $sql = 'DELETE FROM person WHERE person_id = 10';

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':person_id', $person_id);
        $stmt->execute();
    }

    // delete a record
    // $statement_person_id = $db->prepare("DELETE FROM person WHERE person_id = 23;");
    // $statement_person_id->execute();
    // $row_person_id = $statement_person_id->fetch(PDO::FETCH_ASSOC);
    // $person_id = $row_person_id['person_id'];


    $new_page = "index.php";

    header("Location: $new_page");
    
    die();

?>