<?php

    if (!isset($_GET['scripture_id'])) {
        die('Error: scripture id not specified.');
    }
    $scripture_id = htmlspecialchars($_GET['scripture_id']);

    require "week05_team_db_connect.php";
    $db = get_db();
  
    $stmt = $db->prepare('SELECT id, book, chapter, verse, content FROM scriptures WHERE id = :id');
    $stmt->bindValue(':id', $scripture_id, PDO::PARAM_INT);
    $stmt->execute();
    $scripture_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $scripture_book = $scripture_rows[0]['book'];
    $scripture_chapter = $scripture_rows[0]['chapter'];
    $scripture_verse = $scripture_rows[0]['verse'];
    $scripture_content = $scripture_rows[0]['content'];
    
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
    <h1>Scripture Details</h1> 
    
    <h3><?php echo $scripture_book . "&nbsp;" . $scripture_chapter . ":" . $scripture_verse ?></h3>

    <hr>

    <?php

        // while ($scripture_rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //     $id = $scripture_rows[0]['id'];
        //     $book = $scripture_rows[0]['book'];
        //     $chapter = $scripture_rows[0]['chapter'];
        //     $verse = $scripture_rows[0]['verse'];
        //     $content = $scripture_rows[0]['content'];

        //     echo "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>";
        //     // echo "<p><strong><a href='week05_team_scripture_details.php?scripture_id=$id'>$book $chapter:$verse</a></strong><p>";
        //     echo "<hr>";
        // }


    // $scripture_content = $scripture_rows[0]['content'];
    echo $scripture_content;

        // foreach ($scripture_rows as $scrpture_row) {
        //     $content = $scripture_row[0]['content'];
        //     echo "<p>$content<?p>";
        // }

    ?>

</body>
</html>