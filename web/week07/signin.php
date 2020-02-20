<?php
    session_start();

    $badLogin = false;

    if (isset($POST['txtUser']) && isset($POST['txtPassword']))
    {
        $username = $_POST['txtUser'];
        $password = $_POST['txtPassword'];

        require 'db_connect.php';
        $db = get_db();

        $query = '
                SELECT password
                FROM login
                WHERE username = :username
                ';

        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);

        $result = $statement->execute();

        if ($result)
        {
            $row = $statement->fetch();
            $hashedPasswordFromDB = $row['password'];

            if (password_verify($password, $hashedPasswordFromDB))
            {
                $_SESSION['username'] = $username;
                header('Location: welcome.php');
                die();
            }
            else
            {
                $badLogin = true;
            }

        }
        else
        {
            $badLogin = true;
        }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<body>

    <?php

        if ($badLogin)
        {
            echo "Incorrect username or password.<br/><br/>\n";
        }

    ?>
    
    <h1>Sing in</h1>
    <form id="mainForm" action="welcome.php" method="POST">
        <label for="txtUser">Username</label>
            <input type="text" name="txtUser" id="txtUser" placeholder="Username">

        <label for="txtPassword">Password</label>
            <input type="password" name="txtPassword" id="txtPassword" placeholder="Password">
        
            <input type="submit" value="Sign in">
    </form>

    <br/><br/>

    <a href="signup.php">Sign up for a new account</a>

</body>
</html>