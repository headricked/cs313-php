<?php
    require("db_connect.php");
    $db = get_db();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topic Entry</title>
</head>
<body>
    <h1>Enter new scriptures and topics</h1>

    <form id="mainForm" action="insertTopic.php" method="POST">
        
        <label for="txtBook">Book</label>
            <input type="text" id="txtBook" name="txtBook"></input><br/><br/>

        <label for="txtChapter">Chapter</label>
            <input type="text" id="txtChapter" name="txtChapter"></input><br/><br/>

        <label for="txtVerse">Verse</label>
            <input type="text" id="txtVerse" name="txtVerse"></input><br/><br/>

        <label for="txtContent">Content</label>
            <textarea type="text" id="txtContent" name="txtContent" rows="5" cols="50"></textarea><br/><br/>

        <label>Topics:</label><br/>

        <?php

            try {
                // prepare the statement
                $statement = $db->prepare('SELECT id, name FROM topic');
                $statement->execute();

                // loop through each result
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    $id = $row['id'];
                    $name = $row['name'];

                    echo "<input type='checkbox' name='chkTopics[]' id='chkTopics$id' value='$id'>";

                    echo "<label for='chkTopics$id'>$name</label><br/>";

                    echo "\n";
                }
            } catch (PDOException $ex) {
                echo "Error connecting to DB. Details: $ex";
                die();
            }

        ?>

        <br/>

        <input type="submit" value="Add to Database">

    </form>

</body>
</html>