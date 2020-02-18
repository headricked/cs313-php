<?php

    // if (!isset($_GET['person_id'])) {
    //     die('Error: person_id not specified.');
    // }
    $person_id = htmlspecialchars($_GET['person_id']);

    echo "person_id: $person_id";

    // get then assign the values from the add person form
    $new_first_name     = htmlspecialchars($_POST['birth_first_name']);
    $new_middle_name    = htmlspecialchars($_POST['birth_middle_name']);
    $new_last_name      = htmlspecialchars($_POST['birth_last_name']);
    $new_gender         = htmlspecialchars($_POST['birth_gender']);

    // convert gender value male/female to true/false
    // in relation to isMale boolean
    if ($new_gender == 'male') {
        $isMale = true;
    } else {
        $isMale = false;
    }

    require "db_connect.php";
    $db = get_db();

    // insert new person into person table
    $stmt_person = $db->prepare("
                                UPDATE person
                                SET :first_name  ='$new_first_name',
                                    :middle_name ='$new_middle_name',
                                    :last_name   ='$last_name',
                                    :isMale      ='$isMale',
                                WHERE :person_id ='$person_id'
                                ");
    $stmt_person->bindValue(':first_name',  $first_name,  PDO::PARAM_STR);
    $stmt_person->bindValue(':middle_name', $middle_name, PDO::PARAM_STR);
    $stmt_person->bindValue(':last_name',   $last_name,   PDO::PARAM_STR);
    $stmt_person->bindValue(':isMale',      $isMale,      PDO::PARAM_BOOL);
    $stmt_person->bindValue(':person_id',   $person_id,   PDO::PARAM_INT);
    $stmt_person->execute();

    // query the last inserted row from the person table and return the person id
    // $statement_person_id = $db->prepare("SELECT person_id FROM person ORDER BY person_id DESC LIMIT 1;");
    // $statement_person_id->execute();
    // $row_person_id = $statement_person_id->fetch(PDO::FETCH_ASSOC);
    // $person_id = $row_person_id['person_id'];

    // echo "person_id: $person_id";

    // insert birth milestone into milestone table
    // $stmt_milestone = $db->prepare("INSERT INTO milestone (milestone_id, milestone_name, milestone_date, milestone_location, milestone_notes, person_id)
    //     VALUES (DEFAULT, 'Birth', :birth_date, :birth_location, :birth_notes, :person_id);");
    // $stmt_milestone->bindValue(':birth_date',     $birth_date,     PDO::PARAM_STR);
    // $stmt_milestone->bindValue(':birth_location', $birth_location, PDO::PARAM_STR);
    // $stmt_milestone->bindValue(':birth_notes',    $birth_notes,    PDO::PARAM_STR);
    // $stmt_milestone->bindValue(':person_id',      $person_id,      PDO::PARAM_INT);
    // $stmt_milestone->execute();

    // echo "stmt_milestone: $stmt_milestone";

    // $new_page = "details.php";
    $new_page = "details.php?person_id=$person_id";


    header("Location: $new_page");
    
    die();

?>