<?php

    if (!isset($_GET['update'])) {
        die('Error: milestone_id not specified.');
    }
    $milestone_id = htmlspecialchars($_GET['update']);
    // $person_id = htmlspecialchars($_GET['person_id']);


    echo "milestone_id: $milestone_id";

    // get then assign the values from the update person form
    $new_milestone_name     = htmlspecialchars($_POST['milestone_name']);
    $new_milestone_date     = htmlspecialchars($_POST['milestone_date']);
    $new_milestone_location = htmlspecialchars($_POST['milestone_location']);
    $new_milestone_notes    = htmlspecialchars($_POST['milestone_notes']);

    // convert gender value male/female to true/false
    // in relation to isMale boolean
    if ($new_gender == 'male') {
        $new_is_male = 'true';
    } else {
        $new_is_male = 'false';
    }

    require "db_connect.php";
    $db = get_db();

    // update to person in person table
    $stmt_person = $db->prepare("
                                UPDATE milestone
                                SET milestone_name     = '$new_milestone_name',
                                    milestone_date     = '$new_milestone_date',
                                    milestone_location = '$new_milestone_location',
                                    milestone_notes    = '$new_milestone_notes'
                                WHERE milestone_id     = $milestone_id;
                                ");

    $stmt_person->execute();

    $new_page = "details.php?person_id=$person_id";


    header("Location: $new_page");
    
    die();

?>