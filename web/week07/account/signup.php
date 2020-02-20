<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>

    <h1>Sign up for a new account</h1>
    
    <form id="mainForm" action="createAccount.php" method="POST">

        <label for="txtUser">Username</label>
            <input type="text" name="txtUser" id="txtUser" placeholder="Username">

        <label for="txtPassword">Password</label>
            <input type="text" name="txtPassword" id="txtPassword" placeholder="Password">

        <input type="submit" value="Create account">

    </form>

</body>
</html>


<?php



    $new_page = "signin.php";
    header("Location: $new_page");
    die();

?>