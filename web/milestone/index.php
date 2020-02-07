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

  <h1>Milestones for ...</h1>

  <?php

    // $statement = $db->prepare("SELECT id, book, chapter, verse, content FROM scriptures");
    // $statement->execute();

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

    echo "<hr>";

    while ($row = $statement_milestone->fetch(PDO::FETCH_ASSOC)) {
      $name     = $row['milestone_name'];
      $date     = $row['milestone_date'];
      $age      = $row['person_age'];
      $location = $row['milestone_location'];
      $notes    = $row['milestone_notes'];

      // echo "<p><strong><a href='week05_team_scripture_details.php?scripture_id=$id'>$book $chapter:$verse</a></strong><p>";
      echo "<p>$name : $date : $age : $location : $notes<p>";
      echo "<hr>";
    }

  ?>


  </div>

</body>
</html>