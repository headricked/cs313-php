<?php

    require("password.php");

    session_start();
    unset($_SESSION['username']);

    header('Location: signin.php');
    die();

?>