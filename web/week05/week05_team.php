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

    $statement = $db->prepare("SELECT book, chapter, verse, content FROM scriptures");
    $statement->execute();

    var_dump($statement);

    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
      $book = $row['book'];
      $chapter = $row['chapter'];
      $verse = $row['verse'];
      $content = $row['content'];

      echo "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>";
    }

  ?>


  </div>

</body>
</html>