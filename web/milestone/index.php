<?php
  require "db_connect.php";
  $db = get_db();

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Milestone</title>
  </head>

  <body>

  <?php

    // $statement = $db->prepare("SELECT id, book, chapter, verse, content FROM scriptures");
    // $statement->execute();

    // Query the milestone database and assign to variable
    $statement_milestone = $db->prepare("
        WITH theEvent AS (
          SELECT * FROM milestone
          INNER JOIN person
          ON milestone.person_id = person.person_id)
     
        SELECT milestone_name, milestone_date, DATE_PART('year', milestone_date) - DATE_PART('year', birthdate)
          AS person_age, milestone_location, milestone_notes
          FROM theEvent;
      ");
    $statement_milestone->execute();

    // Query the person database and assign to variable
    // $statement_person = $db->prepare("SELECT first_name, middle_name, last_name FROM person;");
    $statement_person = $db->prepare("SELECT person_id, first_name, middle_name, last_name FROM person;");
    $statement_person->execute();

    while ($row_name = $statement_person->fetch(PDO::FETCH_ASSOC)) {
      $p_person_id   = $row_name['person_id'];
      $p_first_name  = $row_name['first_name'];
      $p_middle_name = $row_name['middle_name'];
      $p_last_name   = $row_name['last_name'];

      $full_name = $p_first_name . " " . $p_middle_name . " " . $p_last_name;

      // echo "<h1>$full_name</h1>";
      echo "<h3><a href='details.php?person_id=$p_person_id'>$full_name</a></h3>";
      echo "<hr>";
    }


    
    // while ($row_milestone = $statement_milestone->fetch(PDO::FETCH_ASSOC)) {
    //   $m_name     = $row_milestone['milestone_name'];
    //   $m_date     = $row_milestone['milestone_date'];
    //   $m_age      = $row_milestone['person_age'];
    //   $m_location = $row_milestone['milestone_location'];
    //   $m_notes    = $row_milestone['milestone_notes'];

    //   // echo "<p><strong><a href='week05_team_scripture_details.php?scripture_id=$id'>$book $chapter:$verse</a></strong><p>";
    //   echo "<p>$m_name : $m_date : $m_age : $m_location : $m_notes<p>";      
    //   echo "<hr>";
    // }


  ?>


  </div>

</body>
</html>