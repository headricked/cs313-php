<?php

    // if (!isset($_GET['person_id'])) {
    //     die('Error: person_id not specified.');
    // }
    // $person_id = htmlspecialchars($_GET['person_id']);


    // get then assign the values from the add person form
    $milestone_name     = htmlspecialchars($_POST['milestone_name']);
    $milestone_month    = htmlspecialchars($_POST['milestone_month']);
    $milestone_day      = htmlspecialchars($_POST['milestone_day']);
    $milestone_year     = htmlspecialchars($_POST['milestone_year']);
    $milestone_location = htmlspecialchars($_POST['milestone_location']);
    $milestone_notes    = htmlspecialchars($_POST['milestone_notes']);
    $person_id          = htmlspecialchars($_POST['person_id']);

    // create a date formatted for database insertion
    $milestone_date = $milestone_year . "-" . $milestone_month . "-" . $milestone_day . " 00:00:00";

    require "db_connect.php";
    $db = get_db();


    // // query the last inserted row from the person table and return the person id
    // $statement_person_id = $db->prepare("SELECT person_id FROM person ORDER BY person_id DESC LIMIT 1;");
    // $statement_person_id->execute();
    // $row_person_id = $statement_person_id->fetch(PDO::FETCH_ASSOC);
    // $person_id = $row_person_id['person_id'];


    // insert milestone into milestone table
    $stmt_milestone = $db->prepare("INSERT INTO milestone (milestone_id, milestone_name, milestone_date, milestone_location, milestone_notes, person_id)
        VALUES (DEFAULT, :milestone_name, :milestone_date, :milestone_location, :milestone_notes, :person_id);");
    $stmt_milestone->bindValue(':milestone_name',     $milestone_name,     PDO::PARAM_STR);
    $stmt_milestone->bindValue(':milestone_date',     $milestone_date,     PDO::PARAM_STR);
    $stmt_milestone->bindValue(':milestone_location', $milestone_location, PDO::PARAM_STR);
    $stmt_milestone->bindValue(':milestone_notes',    $milestone_notes,    PDO::PARAM_STR);
    $stmt_milestone->bindValue(':person_id',          $person_id,          PDO::PARAM_INT);
    $stmt_milestone->execute();

    // $new_page = "details.php";
    $new_page = "details.php?person_id=$person_id";


    header("Location: $new_page");
    
    die();

?>