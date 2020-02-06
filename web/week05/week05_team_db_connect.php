<?php

    function get_db() {
        $db = NULL;

        try {
            // default Heroku Postregs configuration URL
            $dbUrl = getenv('DATABASE_URL');

            // get the various parts of the DB Connection from the URL
            $dbOpts = parse_url($dbUrl);

            $dbHost = $dbOpts["host"];
            $dbPort = $dbOpts["port"];
            $dbUser = $dbOpts["user"];
            $dbPassword = $dbOpts["pass"];
            $dbName = ltrim($dbOpts["path"],'/');

            // create the PDO connection
            $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

            // this line makes PDO give an exception when there are problems, helpful for debugging
            $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        
        catch (PDOException $ex) {
            // if this were in production, you would not want to echo the exception details
            echo "Error connecting to DB. Details: $ex";
            die();
            
            return $db;
        }
    }
?>