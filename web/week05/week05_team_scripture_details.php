<?php

    echo "first php is firing off";

    if (!isset($_GET['scripture_id'])) {
        die('Error: scripture id not specified.');
    }
    
    $scripture_id = htmlspecialchars($_GET['scripture_id']);

    require "week05_team_db_connect.php";
    $db = get_db();
  
    $stmt = $db->prepare('SELECT book, chapter, verse, content FROM scriptures WHERE id = :id');
    $stmt->bindValue(':id', $scripture_id, PDO::PARAM_INT);
    $stmt->execute();
    // $scripture_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
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

        foreach ($scripture_rows as $scrpture_row) {
            $content = $scripture_row['content'];
            echo "<p>$content<?p>";
        }

    ?>

</body>
</html>