<?php

    if (!isset($_GET['update'])) {
        die('Error: person_id not specified.');
    }
    $person_id = htmlspecialchars($_GET['update']);

    echo "person_id: $person_id";

    // get then assign the values from the add person form
    $new_first_name     = htmlspecialchars($_POST['birth_first_name']);
    $new_middle_name    = htmlspecialchars($_POST['birth_middle_name']);
    $new_last_name      = htmlspecialchars($_POST['birth_last_name']);
    $new_gender         = htmlspecialchars($_POST['birth_gender']);

    echo "new_first_name: $new_first_name";
    echo "new_middle_name: $new_middle_name";
    echo "new_last_name: $new_last_name";
    echo "new_gender: $new_gender";

    // convert gender value male/female to true/false
    // in relation to isMale boolean
    if ($new_gender == 'male') {
        $new_is_male = 'true';
    } else {
        $new_is_male = 'false';
    }

    echo "new_is_male: $new_is_male";

    require "db_connect.php";
    $db = get_db();

    // update to person in person table
    $stmt_person = $db->prepare("
                                UPDATE person
                                SET first_name  = '$new_first_name',
                                    middle_name = '$new_middle_name',
                                    last_name   = '$new_last_name',
                                    is_male     = '$new_is_male'
                                WHERE person_id = $person_id;
                                ");
    // $stmt_person->bindValue(':new_first_name',  $new_first_name,  PDO::PARAM_STR);
    // $stmt_person->bindValue(':new_middle_name', $new_middle_name, PDO::PARAM_STR);
    // $stmt_person->bindValue(':last_name',       $new_last_name,   PDO::PARAM_STR);
    // $stmt_person->bindValue(':new_is_male',     $new_is_male,     PDO::PARAM_BOOL);
    // $stmt_person->bindValue(':person_id',       $person_id,       PDO::PARAM_INT);
    $stmt_person->execute();


    $new_page = "details.php?person_id=$person_id";


    header("Location: $new_page");
    
    die();

?>