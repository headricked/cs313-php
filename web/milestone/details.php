<?php

    if (!isset($_GET['person_id'])) {
        die('Error: person_id not specified.');
    }
    $person_id = htmlspecialchars($_GET['person_id']);

    require "db_connect.php";
    $db = get_db();
  

    // Query the milestone database and assign to variable
    $statement_milestone = $db->prepare("
        WITH theEvent AS (
            SELECT * FROM milestone
            INNER JOIN person
            ON milestone.person_id = person.person_id
            WHERE person.person_id = ':person_id')
       
       SELECT milestone_name, milestone_date, DATE_PART('year', milestone_date) - DATE_PART('year', birthdate)
            AS person_age, milestone_location, milestone_notes
            FROM theEvent;
    ");
    $statement_person->bindValue(':person_id', $person_id, PDO::PARAM_INT);
    $statement_milestone->execute();

    // query the database for person data
    // $statement_person = $db->prepare("SELECT id, book, chapter, verse, content FROM scriptures WHERE id = :id");
    // $statement_person->bindValue(':id', $person_id, PDO::PARAM_INT);
    // $statement_person->execute();
    // $scripture_rows = $statement_person->fetchAll(PDO::FETCH_ASSOC);

    // $scripture_id = $scripture_rows[0]['id'];
    // $scripture_book = $scripture_rows[0]['book'];
    // $scripture_chapter = $scripture_rows[0]['chapter'];
    // $scripture_verse = $scripture_rows[0]['verse'];
    // $scripture_content = $scripture_rows[0]['content'];
    // $scripture_reference = 
    //     $scripture_rows[0]['book'] . "&nbsp;" .
    //     $scripture_rows[0]['chapter'] . ":" .
    //     $scripture_rows[0]['verse'];
    
    // var_dump($scripture_rows);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scripture Details</title>
</head>
<body>
    <h1>Milestones</h1> 
    <h3><?php echo $scripture_reference ?></h3>
    <hr>
    <?php echo $scripture_content ?>

    <?php
        while ($row_milestone = $statement_milestone->fetch(PDO::FETCH_ASSOC)) {
        $m_name     = $row_milestone['milestone_name'];
        $m_date     = $row_milestone['milestone_date'];
        $m_age      = $row_milestone['person_age'];
        $m_location = $row_milestone['milestone_location'];
        $m_notes    = $row_milestone['milestone_notes'];

        // echo "<p><strong><a href='week05_team_scripture_details.php?scripture_id=$id'>$book $chapter:$verse</a></strong><p>";
        echo "<p>$m_name : $m_date : $m_age : $m_location : $m_notes<p>";      
        echo "<hr>";
        }
    ?>


    
    <hr>
    <h3>Add a Scripture</h3>
    <form method="POST" action="insert_notes.php">
        <input    name="scripture_book"    placeholder="book"    type="text"><br/>
        <input    name="scripture_chapter" placeholder="chapter" type="number" min="1"><br/>
        <input    name="scripture_verse"   placeholder="verse"   type="number" min="1"><br/>
        <textarea name="scripture_content" placeholder="content" cols="50" rows="10"></textarea><br/>
        <input type="submit" value="Create note">
    </form>

</body>
</html>