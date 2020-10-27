<?php

// =========================================================================
mysql://bbde569d9ae04c:2537dd1c@us-cdbr-east-02.cleardb.com/heroku_d04aca4751f4e3e?reconnect=true
// ==========================================================================
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
  echo '<script> console.log("Database connection success!") </script>';
} 
catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

  // $query = 'SELECT * FROM `users`';
  // try {
  //     $res = $pdo->prepare($query);
  //     $res->execute($values);
  //     print_r($res);
  // }
  // catch (PDOException $e) {
  //    throw new Exception('Database query error');
  // }
function getUsers() {
  try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare('SELECT * FROM `users`');
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $results = $stmt->fetchAll();
    print_r($results);
  } 
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
}
