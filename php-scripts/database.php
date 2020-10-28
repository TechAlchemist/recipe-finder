<?php

// =========================================================================
// mysql://bbde569d9ae04c:2537dd1c@us-cdbr-east-02.cleardb.com/heroku_d04aca4751f4e3e?reconnect=true
// ==========================================================================

function getUsers() {
  try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare('SELECT * FROM `users`');
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $results = $stmt->fetchAll();
    print_r($results);
  } 
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
}

function authUser($username, $pass) {
  $host = 'us-cdbr-east-02.cleardb.com';
  $database = 'heroku_d04aca4751f4e3e';
  $user = 'bbde569d9ae04c';
  $port = '5432';
  $password = '2537dd1c';
  $pdo = NULL;
  $dsn = 'mysql:host=' . $host . ';dbname=' . $database;
  $conn = new PDO("mysql:host=$host;dbname=heroku_d04aca4751f4e3e", $user, $password);
  try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE username = '" . $username . "'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $results = $stmt->fetchAll();
    $_SESSION['user_id'] = $results[0]['user_id'];
    $_SESSION['username'] = $results[0]['username'];
    return true;
  } 
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    return false;
  }
}

function getFavoriteRecipes() {
  $host = 'us-cdbr-east-02.cleardb.com';
  $database = 'heroku_d04aca4751f4e3e';
  $user = 'bbde569d9ae04c';
  $port = '5432';
  $password = '2537dd1c';
  $pdo = NULL;
  $dsn = 'mysql:host=' . $host . ';dbname=' . $database;
  $conn = new PDO("mysql:host=$host;dbname=heroku_d04aca4751f4e3e", $user, $password);
  try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare('SELECT `recipe_id` FROM `favorite-recipes` WHERE user_id = ' . $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $results = $stmt->fetchAll();
    return $results;
  } 
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
}
