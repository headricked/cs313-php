<?php
    require("db_connect.php");
    $db = get_db();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scripture and Topic List</title>
</head>
<body>

    <h1>Scripture and Topic List</h1>

    <?php

        try {
            $statement = $db->prepare('SELECT id, book, chapter, verse, content FROM scriptures');
            $statement->execute();

            echo '<hr>';

            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                echo '<p>';
                echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':';
                echo $row['verse'] . '</strong>' . ' - ' . $row['content'];
                echo '<br/>';
                echo 'Topics: ';

                // get the topics for the scripture
                $statementTopics = $db->prepare('SELECT name FROM topic t' . ' INNER JOIN scripture_topic st ON st.topic_id = t.id' . ' WHERE st.scripture_id = :scriptureId');

                $statementTopics->bindValue(':scriptureId', $row['id']);
                $statementTopics->execute();

                while ($topicRow = $statementTopics->fetch(PDO::FETCH_ASSOC)) {
                    echo $topicRow['name'] . ' ';
                }

                echo '</p>';
                echo '<hr>';
            }

        } catch (PDOException $ex) {
            echo "Error with DB. Details: $ex";
            die();
        }

    ?>

    <a href="index.php">Add Another Scripture</a>

</body>
</html>