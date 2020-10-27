<?php
session_start();
$host = 'us-cdbr-east-02.cleardb.com';
$database = 'heroku_d04aca4751f4e3e';
$user = 'bbde569d9ae04c';
$port = '5432';
$password = '2537dd1c';
$pdo = NULL;
$dsn = 'mysql:host=' . $host . ';dbname=' . $database;
$conn = new PDO("mysql:host=$host;dbname=heroku_d04aca4751f4e3e", $user, $password);

$recipeId = $_POST['data'];

if (isset($_SESSION['user_id']) == false || $recipeId == null) {
    echo 'Database insertion failed: Issue with user id or recipe id. ';
}
else {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO `favorite-recipes` (`user_id`, `recipe_id`) VALUES (" . $_SESSION['user_id'] . " , " . $recipeId . ")";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      } 
}

