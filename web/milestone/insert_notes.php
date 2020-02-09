<?php

    $book    = htmlspecialchars($_POST['scripture_book']);
    $chapter = htmlspecialchars($_POST['scripture_chapter']);
    $verse   = htmlspecialchars($_POST['scripture_verse']);
    $content = htmlspecialchars($_POST['scripture_content']);

    require "db_connect.php";
    $db = get_db();

    $stmt = $db->prepare('INSERT INTO scriptures (book, chapter, verse, content)
        VALUES (:book, :chapter, :verse, :content);');
    $stmt->bindValue(':book',    $book,    PDO::PARAM_STR);
    $stmt->bindValue(':chapter', $chapter, PDO::PARAM_INT);
    $stmt->bindValue(':verse',   $verse,   PDO::PARAM_INT);
    $stmt->bindValue(':content', $content, PDO::PARAM_STR);
    $stmt->execute();

    $new_page = "index.php";

    header("Location: $new_page");
    
    die();

    // $scripture_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>