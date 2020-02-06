<?php
  require "week05_team_db_connect.php";
  $db = get_db();

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Scripture List</title>
  </head>

  <body>

  <h1>Scripture Resources</h1>

  <?php

    $statement = $db->prepare("SELECT id, book, chapter, verse, content FROM scriptures");
    $statement->execute();

    echo "<hr>";

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $id = $row['id'];
      $book = $row['book'];
      $chapter = $row['chapter'];
      $verse = $row['verse'];
      $content = $row['content'];

      // echo "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>";
      echo "<p><strong><a href='week05_team_scripture_details.php?scripture_id=$id'>$book $chapter:$verse</a></strong><p>";
      echo "<hr>";
    }

  ?>


  </div>

</body>
</html>