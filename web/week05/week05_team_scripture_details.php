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

    $scripture_id = $scripture_rows[0]['id'];
    $scripture_book = $scripture_rows[0]['book'];
    $scripture_chapter = $scripture_rows[0]['chapter'];
    $scripture_verse = $scripture_rows[0]['verse'];
    $scripture_content = $scripture_rows[0]['content'];
    $scripture_reference = 
        $scripture_rows[0]['book'] . "&nbsp;" .
        $scripture_rows[0]['chapter'] . ":" .
        $scripture_rows[0]['verse'];
    
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
    <h3><?php echo $scripture_reference ?></h3>
    <hr>
    <?php echo $scripture_content ?>
    
    <hr>
    <h3>Add a Scripture</h3>
    <form method="POST" action="insert_notes.php">
        <input    name="scripture_book"    placeholder="book">
        <input    name="scripture_chapter" placeholder="chapter">
        <input    name="scripture_verse"   placeholder="verse">
        <textarea name="scripture_content" placeholder="content" cols="30" rows="30"></textarea>
        <input type="submit" value="Create note">
    </form>

</body>
</html>