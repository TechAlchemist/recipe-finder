<?php

include 'database.php';
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    echo 'we are this far at least.';
    $email = $_POST['username'];
    $pass = $_POST['password'];   
    if (authUser($email, $pass)) {
        header('Location: https://brandons-recipe-finder.herokuapp.com/');
    }
    else {
        echo 'Auth Failure. ';
    }
}
else {
    echo 'FAILED. ';
}

