<?php

    echo "first php is firing off<br/>";

    if (!isset($_GET['scripture_id'])) {
        die('Error: scripture id not specified.');
    }
    
    echo "second php is firing off<br/>";

    $scripture_id = htmlspecialchars($_GET['scripture_id']);

    echo "third php is firing off<br/>";

    require "week05_team_db_connect.php";

    echo "fourth php is firing off<br/>";

    $db = get_db();
  
    echo "fifth php is firing off<br/>";

    $stmt = $db->prepare('SELECT id, book, chapter, verse, content FROM scriptures WHERE id = :id');

    echo "sixth php is firing off<br/>";

    $stmt->bindValue(':id', $scripture_id, PDO::PARAM_INT);

    echo "seventh php is firing off<br/>";

    $stmt->execute();

    echo "eighth php is firing off<br/>";

    $scripture_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "ninth php is firing off<br/>";

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
    <h1>Scripture Details for scripture ID: <?php echo $scripture_id ?></h1>

    <?php

        while ($scripture_rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $book = $row['book'];
            $chapter = $row['chapter'];
            $verse = $row['verse'];
            $content = $row['content'];

            // echo "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>";
            echo "<p><strong><a href='week05_team_scripture_details.php?scripture_id=$id'>$book $chapter:$verse</a></strong><p>";
            echo "<hr>";
        }



        // foreach ($scripture_rows as $scrpture_row) {
        //     $content = $scripture_row['content'];
        //     echo "<p>$content<?p>";
        // }

    ?>

</body>
</html>