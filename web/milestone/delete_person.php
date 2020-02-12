<?php

    // if (!isset($_GET['person_id'])) {
    //     die('Error: person_id not specified.');
    // }
    // $person_id = htmlspecialchars($_GET['person_id']);


    // // get then assign the values from the add person form
    // $first_name     = htmlspecialchars($_POST['birth_first_name']);
    // $middle_name    = htmlspecialchars($_POST['birth_middle_name']);
    // $last_name      = htmlspecialchars($_POST['birth_last_name']);
    // $month          = htmlspecialchars($_POST['birth_month']);
    // $day            = htmlspecialchars($_POST['birth_day']);
    // $year           = htmlspecialchars($_POST['birth_year']);
    // $gender         = htmlspecialchars($_POST['birth_gender']);
    // $birth_location = htmlspecialchars($_POST['birth_location']);
    // $birth_notes    = htmlspecialchars($_POST['birth_notes']);

    // // create a date formatted for database insertion
    // $birth_date = $year . "-" . $month . "-" . $day . " 00:00:00";

    // // convert gender value male/female to true/false
    // // in relation to isMale boolean
    // if ($gender == 'male') {
    //     $isMale = true;
    // } else {
    //     $isMale = false;
    // }

    require "db_connect.php";
    $db = get_db();

    // insert new person into person table
    // $stmt_person = $db->prepare("INSERT INTO person (person_id, first_name, middle_name, last_name, birthdate, is_male)
    //     VALUES (DEFAULT, :first_name, :middle_name, :last_name, :birth_date, :isMale);");
    // $stmt_person->bindValue(':first_name',  $first_name,  PDO::PARAM_STR);
    // $stmt_person->bindValue(':middle_name', $middle_name, PDO::PARAM_STR);
    // $stmt_person->bindValue(':last_name',   $last_name,   PDO::PARAM_STR);
    // $stmt_person->bindValue(':birth_date',  $birth_date,  PDO::PARAM_STR);
    // $stmt_person->bindValue(':isMale',      $isMale,      PDO::PARAM_BOOL);
    // $stmt_person->execute();


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

    $new_page = "index.php";

    header("Location: $new_page");
    
    die();

?>