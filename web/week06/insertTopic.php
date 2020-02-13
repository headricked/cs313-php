<?php

    // get the POST data
    $book = $_POST['txtBook'];
    $chapter = $_POST['txtChapter'];
    $verse = $_POST['txtVerse'];
    $content = $_POST['txtContent'];
    $topicIds = $_POST['chkTopics'];

    require("db_connect.php");
    $db = get_db();

    try {
        $query = 'INSERT INTO scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)';

        $statement = $db->prepare($query);

        $statement->bindValue(':book', $book);
        $statement->bindValue(':chapter', $chapter);
        $statement->bindValue(':verse', $verse);
        $statement->bindValue(':content', $content);

        $statement->execute();

        // get new id using special function
        $scriptureId = $db->lastInsertId("scripture_id_seq");

        // loop through each topicid and insert the value into each scripture
        foreach ($topicIds as $topicId) {
            echo "ScriptureId: $scriptureId, topicId: $topicId";

            $statement = $db->prepare('INSERT INTO scripture_topic(scriptureId, topicId) VALUES (:scriptureId, :topicId)');

            $statement->bindValue(':scriptureId', $scriptureId);
            $statement->bindValue(':topicId', $topicId);

            $statement->execute();
        }
    } catch (Exception $ex) {
        echo "Error with DB. Details: $ex";
        die();
    }


    $new_page = "showTopics.php";
    header("Location: $new_page");

    die();

?>