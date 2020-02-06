<?php
  require('week05_team_db_connect.php');
  $db = get_db();

  $query = 'SELECT id, book, chapter, verse, content FROM scriptures';
  $stmt = $db->prepare($query);
  $stmt->execute();
  $scriptures = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Scripture Resourses</title>
  </head>
  <body>
  
  <h1>Scripture Resources</h1>
  
  <?php

    echo "<hr>";


    $statement = $db->prepare("SELECT book, chapter, verse, content FROM scripture");
    $statement->execute();

    // Go through each result
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
      // The variable "row" now holds the complete record for that
      // row, and we can access the different values based on their
      // name
      $book = $row['book'];
      $chapter = $row['chapter'];
      $verse = $row['verse'];
      $content = $row['content'];

      echo `<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>`;
    }
  ?>



</body>
</html>