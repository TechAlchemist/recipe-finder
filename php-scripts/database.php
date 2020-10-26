<?php

// =========================================================================
// Host ec2-3-228-114-251.compute-1.amazonaws.com
// Database d5mhrju0ko810k
// User hzktebnwtqkeis
// Port 5432
// Password c0733cf910ea9d09bc39f42b12eb09c248bd6824b28e8a9cc5d6a8228bd2e001 
// ==========================================================================
$host = 'ec2-3-228-114-251.compute-1.amazonaws.com';
$database = 'd5mhrju0ko810k';
$user = 'hzktebnwtqkeis';
$port = '5432';
$password = 'c0733cf910ea9d09bc39f42b12eb09c248bd6824b28e8a9cc5d6a8228bd2e001';
$pdo = NULL;
$dsn = 'mysql:host=' . $host . ';dbname=' . $database;

try {
    $conn = new PDO("mysql:host=$host;dbname=d5mhrju0ko810k", $user, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
