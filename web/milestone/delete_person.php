<?php

    echo "delete_person.php";

    require "db_connect.php";
    $db = get_db();

    echo "connect to db";

    // Delete a row in the person table specified by id
    // $sql = 'DELETE FROM person WHERE person_id = :person_id';
    if ( isset($_GET['del']) ) {

        echo "entered if statement";

        $id = $_GET['del'];

        echo "id: $id";

        $sql = 'DELETE FROM person WHERE person_id = :id;';
        // $sql = 'DELETE FROM person WHERE person_id = 10';
        
        echo "sql statement: $sql";

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }




    // $stmt_milestone = $db->prepare("INSERT INTO milestone (milestone_id, milestone_name, milestone_date, milestone_location, milestone_notes, person_id)
    //     VALUES (DEFAULT, 'Birth', :birth_date, :birth_location, :birth_notes, :person_id);");
    // $stmt_milestone->bindValue(':birth_date',     $birth_date,     PDO::PARAM_STR);
    // $stmt_milestone->bindValue(':birth_location', $birth_location, PDO::PARAM_STR);
    // $stmt_milestone->bindValue(':birth_notes',    $birth_notes,    PDO::PARAM_STR);
    // $stmt_milestone->bindValue(':person_id',      $person_id,      PDO::PARAM_INT);
    // $stmt_milestone->execute();





    $new_page = "index.php";

    header("Location: $new_page");
    
    die();

?>